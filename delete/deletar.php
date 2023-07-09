<?php 
include('../conexao/conexao.php');
$id = base64_decode($_GET['id']);
$querySql = mysqli_query($conexao, "SELECT * FROM animais WHERE id=$id ");
$result = mysqli_fetch_array($querySql);
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirme</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index/index.php">Gustavo Zaia e Moisés</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars" id="hamb"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="../index/index.php">Consulta</a>
                    <a class="nav-link" href="../cadastro/cadAnimais.php">Cadastro</a>
                    <!-- <a class="nav-link" href="#">Pricing</a> -->
                </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="form-card">
                <form action="deletou.php?id=<?php echo $id?>" onlyread enctype="multipart/form-data" method="POST">
                    <h1 class="title-form">Exclusão de cadastro</h1>
                    <br>
                    <label for="nome">Nome do animal</label>
                        <input type="text" class="form-control" placeholder="Nome" readonly name="nome" aria-label="" aria-describedby="button-addon2"  value="<?php echo $result['nome']?>">
                    <br>
                    <label for="nomeTutor">Nome do tutor</label>
                        <input type="text" class="form-control" placeholder="Nome do tutor" readonly name="nomeTutor" aria-label="" aria-describedby="button-addon2"value="<?php echo $result['tutor']?>">
                    <br>
                    <label for="tipo">Tipo do animal</label>
                        <input type="text" name="tipo" class="form-control" readonly placeholder="Tipo do animal" aria-label="" aria-describedby="button-addon2" value="<?php echo $result['tipo']?>">
                    <br>
                    <label for="dataNasc">Data de nascimento</label>
                        <input type="datetime-local" name="dataNasc" readonly class="form-control" placeholder="Data de nascimento" aria-label="" aria-describedby="button-addon2" value="<?php echo $result['data_nasc']?>">
                    <br>
                    <label for="arquivo">Foto: <img class="preview-alt" src="<?php 
                    if(!empty($result['foto'])){
                    echo $result['foto'];
                    }else{
                        echo '../arquivos/sem_imagem.jpg';
                    }
                    ?>
                    
                    
                    
                    " width="100px" alt="" srcset=""></label>
                    <!-- <input type="file"  class="form-control" name="arquivo" readonly id="foto"> -->
                    
                    
                    <br>
                    <div class="buttons">
                        <button type="submit" id="btnExc"class="btn btn-danger">Excluir</button>
                        <a href="../index/index.php"><button type="button" class="btn btn-primary">Voltar</button></a>
                    </div>
                </form>
            </div>
        </div>
        
    <script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>


<?php
    // if(!empty($_GET['id'])){
    //     $id = $_GET['id'];

    //     $querySql = mysqli_query($conexao, "SELECT * FROM cad_animais WHERE id=$id ");
    //     $res = mysqli_fetch_array($querySql);
    //     // $imagem = $res['foto'];
    //     //var_dump($querySql);
    //     if($querySql->num_rows > 0){
    //         $sqlDelete = mysqli_query($conexao, "DELETE FROM cad_animais WHERE id=$id");
    //         $imagem = $res['foto'];
    //         if($imagem != "gato.jpg" || "cachorro.jpg" || "elefante.jpg" || "cabra.jpg" || "porco.jpg"){
    //         unlink('../arquivos/'.$imagem); 
    //         }
    //     }
    // }
    // header('Location: ../index/index.php')

//var_dump($querySql);
?>