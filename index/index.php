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

        <div class="container-fluid ct-tabela">
            
                <a href="index.php"><button type="button" class="btn btn-primary btn-refresh"><i class="fa-solid fa-arrows-rotate"></i> Atualizar Página</button></a>
				<br>
				<a href="../cadastro/cadAnimais.php"><button type="button" class="btn btn-success"><i class="fa-solid fa-plus"></i> Adicionar animal</button></a>
                <br>
                <form action="../pesquisa/pesquisa.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="pesquisa" class="form-control"  placeholder="Filtrar pelo nome" aria-label="Filtrar pelo nome" aria-describedby="button-addon2">
                        <button class="btn btn-outline-success" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </form>
            
        </div>

        <div class="container-fluid ct-tabela"> 

                <label for="table" class="top-table">(Clique na imagem para mais detalhes)</label>
                <table class="table table-bordered bg-light table-hover">
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
                    include('../conexao/conexao.php');
                    
                    $query = mysqli_query($conexao, "SELECT * FROM animais order by id");
                    while($dados=mysqli_fetch_array($query)) { ?>
                        <?php $data = $dados['data_nasc'];
                        $id = base64_encode($dados['id']);
                        ?>
                            
                    <tbody>
                        <tr>
                        <a href="verproduto.php?id=<?php echo $id?>"><td><?php echo $dados['id']?></td></a>
                        <td><?php echo $dados['nome']?></td>
                        <td><?php echo $dados['tutor']?></td>
                        <td><?php echo $dados['tipo']?></td>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($data))?></td>
                        <td><a href="verproduto.php?id=<?php echo $id?>"><img class="foto_ger rounded" src="<?php 
                        if(empty($dados['foto'])){
                            $imagem = '../arquivos/sem_imagem.jpg';
                            echo $imagem;
                        }else{
                        echo $dados['foto']; }
                        ?>" alt="Preview" ></a></td>
                         <td><a class="excluir" href="../delete/deletar.php?id=<?php echo $id?>"><button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button> Excluir</a>
                        <a class="alterar" href="../alterar/alterar.php?id=<?php echo $id?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-square-pen"></i></button> Alterar</a></td>
                        </tr>
                    </tbody>

                    <?php }?>
                </table>
            </div>
        </div>


    <script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    </body>
</html>

<!-- href="../delete/deletar.php?id=<?php //echo $dados['id']?>" -->