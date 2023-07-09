<?php
    include('../conexao/conexao.php');
    $id = base64_decode($_GET['id']);
    $query = mysqli_query($conexao, "SELECT * FROM animais WHERE id=$id");
    $result = mysqli_fetch_array($query);
    $data = $result['data_nasc'];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title>Animais</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Gustavo Zaia e Moisés</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars" id="hamb"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="index.php">Consulta</a>
                <a class="nav-link" href="../cadastro/cadAnimais.php">Cadastro</a>
                <!-- <a class="nav-link" href="#">Pricing</a> -->
            </div>
            </div>
        </div>
        </nav>
        <div id="principal">
            <div id="card">
                <div class="left-card">
                    <img class="rounded view-img" src="<?php
					if(!empty($result['foto'])){
					echo $result['foto'];
					}else{
						echo '../arquivos/sem_imagem.jpg';
					}
					?>" alt="" srcset="">
                </div>
                <div class="right-card">
                    <h1 id="nomeAnimal"><?php echo $result['nome']?></h1>
                        <div class="colunas">
                            <p><b>Tutor: </b> <?php echo $result['tutor']?></p> 
                            <p><b>Tipo: </b> <?php echo $result['tipo']?></p> 
                            <p><b>Data de nascimento: </b> <?php echo date('d/m/Y H:i:s', strtotime($data))?></p> 
                        </div>
                        <div class="botoes">
                            <?php $id = base64_encode($result['id']);?>
                            <a href="../delete/deletar.php?id=<?php echo $id?>"><button  type="button" class="btn btn-danger btn-lg exc-verProd">Excluir <i class="fa-solid fa-trash"></i></button></a>
                            <a href="../alterar/alterar.php?id=<?php echo $id?>"><button  type="button" class="btn btn-warning btn-lg alt-verProd">Alterar <i class="fa-solid fa-square-pen"></i></button></a>
                        </div>   
                         
                </div>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    </body>
</html>

<!-- href="../delete/deletar.php?id=<?php //echo $dados['id']?>" -->