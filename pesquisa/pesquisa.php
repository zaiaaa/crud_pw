<?php 
    include('../conexao/conexao.php');

    $pesquisa = $_POST['pesquisa'];

    $query = mysqli_query($conexao, "SELECT * FROM animais WHERE nome LIKE '%$pesquisa%'");
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

        <div class="container-fluid ct-tabela">
            
                <a href="../cadastro/cadAnimais.php"><button type="button" class="btn btn-success"><i class="fa-solid fa-plus"></i> Adicionar animal</button></a>
                <br>
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="pesquisa" placeholder="Filtrar pelo nome" aria-label="Filtrar pelo nome" aria-describedby="button-addon2">
                        <button class="btn btn-outline-success" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </form>
            
        </div>

        <div class="container-fluid ct-tabela"> 
           <h2>Você buscou por: <span><?php echo $pesquisa ?></span> </h2>
            <table class="table table-bordered table-light">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tutor</th>
                    <th scope="col">Tipo</th>
                    <th class="dataNasc" scope="col">Data de nascimento</th>
                    <th class="foto" scope="col">Foto</th>
                    <th class="opc" scope="col">Opções</th>
                    </tr>
                </thead>
                <?php 
                while($dados=mysqli_fetch_array($query)) { 
				$id = base64_encode($dados['id']);

				?>
                    
                <tbody>
                    <tr>
                    <td><?php echo $dados['id']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['tutor']?></td>
                    <td><?php echo $dados['tipo']?></td>
                    <td><?php echo $dados['data_nasc']?></td>
                    <td> <a href="../index/verproduto.php?id=<?php echo $id?>"><img class="foto_ger" src="<?php 
                    if(empty($dados['foto'])){
                            $imagem = '../arquivos/sem_foto.png';
                            echo $imagem;
                        }else{
                        echo $dados['foto']; }?>" alt="Preview" ></a></td>
                    <td> <a class="excluir" href="../delete/deletar.php?id=<?php echo $id?>"><button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button> Excluir</a> 
                    <a class="alterar" href="../alterar/alterar.php?id=<?php echo $id?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-square-pen"></i></button> Alterar</a></td>
                    </tr>
                </tbody>

                <?php }?>
            </table>
        </div>



    <script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>