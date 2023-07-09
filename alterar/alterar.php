<?php 
    include('../conexao/conexao.php');

        if(isset($_GET['id'])){
        $id = base64_decode($_GET['id']);
    }

    
        $querySql = mysqli_query($conexao, "SELECT * FROM animais WHERE id = $id ");

        $result = mysqli_fetch_array($querySql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro</title>
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
                <form action="alteracao.php?id=<?php echo $id?>" enctype="multipart/form-data" method="POST">
                    <h1 class="title-form">Alteração de cadastro</h1>
                    <br>
                    <label for="nome">Nome do animal</label>
                        <input type="text" class="form-control" placeholder="Nome" name="nome" aria-label="" aria-describedby="button-addon2" value="<?php echo $result['nome']?>">
                    <br>
                    <label for="nomeTutor">Nome do tutor</label>
                        <input type="text" class="form-control" placeholder="Nome do tutor" name="nomeTutor" aria-label="" aria-describedby="button-addon2"value="<?php echo $result['tutor']?>">
                    <br>
                    <label for="tipo">Tipo do animal</label>
                        <input type="text" name="tipo" class="form-control" placeholder="Tipo do animal" aria-label="" aria-describedby="button-addon2" value="<?php echo $result['tipo']?>">
                    <br>
                    <label for="dataNasc">Data de nascimento</label>
                        <input type="datetime-local" name="dataNasc" class="form-control" placeholder="Data de nascimento" aria-label="" aria-describedby="button-addon2" value="<?php echo $result['data_nasc']?>">
                    <br>
                    <label for="arquivo">Foto Antiga: <img class="preview-alt" src="<?php 
                    if(!empty($result['foto'])){
                    echo $result['foto'];
                    
                    }
                    ?>                   
                    " width="100px" alt="" srcset=""></label>
                    <input type="file"  class="form-control" name="arquivo" id="foto">
                    
                    <input type="text" class="ghost-input" name="arq_antigo" id="" value="<?php echo $result['foto']?>">
                    <br>
                    <div class="buttons">
                        <button type="submit" class="btn btn-success">Enviar</button>
                        <button type="reset" class="btn btn-warning">Limpar</button>
                    </div>
                </form>
            </div>
        </div>
        
<script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>

<script>



</script>

<script src="../js/bootstrap.min.js"></script>
</body>
</html>