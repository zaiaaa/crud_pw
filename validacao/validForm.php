<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title><?php ?></title>
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

<?php 
    include('../conexao/conexao.php');
    
    

if(!empty($_POST['nome']) && !empty($_POST['nomeTutor']) && !empty($_POST['tipo']) && !empty($_POST['dataNasc'])){
   $nome = $_POST['nome'];
   $tutor = $_POST['nomeTutor'];
   $tipo = $_POST['tipo'];
   $dataNasc = $_POST['dataNasc'];
   $foto = $_FILES['arquivo'];
   
    if(!empty($foto)){
        $pasta = "../arquivos/";
        $nomeDoArquivo = $_FILES['arquivo']['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
        // if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png'){
        //     die("Tipo de arquivo incompatível");
        // }
        if($extensao == 'jpg' || $extensao == 'png' || $extensao == 'webp' || $extensao == 'jpeg'){
            $imagem = $pasta . $novoNomeDoArquivo . "." . $extensao;
        }else if($extensao == ''){
            $imagem = '';
        }
        else{
            header('Location: invalidForm.php');
        }
        $certo = move_uploaded_file($_FILES['arquivo']['tmp_name'], $imagem);
    }else $imagem = '';
    

        if($certo){
            $query = mysqli_query($conexao, "INSERT INTO animais (nome, tutor, tipo, data_nasc, foto) VALUES ('$nome', '$tutor', '$tipo', '$dataNasc', '$imagem')");
        }else{
            $query = mysqli_query($conexao, "INSERT INTO animais (nome, tutor, tipo, data_nasc) VALUES ('$nome', '$tutor', '$tipo', '$dataNasc')");
        }


}else 
{
    header('Location: invalidForm.php');
}

    
    ?>
        <div class="main">
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div class="txt-alert">
                    <i class="fa-solid fa-check"></i> Arquivos enviados com sucesso!   
                    </div>
            </div>
        </div>
        <?php var_dump($foto)?>
        <div class="cadastrado_main">
            <div class="shadow p-3 mb-5 bg-body rounded">
                    <table class="table table-bordered table-hover p-3 mb-5">
                        <h1 class="cadastrou">Você Cadastrou: </h1>
                        <thead>
                            <tr>

                            <th scope="col">Nome</th>
                            <th scope="col">Tutor</th>
                            <th scope="col">Tipo</th>
                            <th class="dataNasc" scope="col">Data de nascimento</th>
                            <th scope="col">Foto</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><?php echo $nome?></td>
                            <td><?php echo $tutor?></td>
                            <td><?php echo $tipo?></td>
                            <td><?php echo date('d/m/Y H:i:s', strtotime($dataNasc))?></td>
                            <td><img class="rounded cadastrou_tal" src="<?php 
                            if(!$certo){
                                echo '../arquivos/sem_imagem.jpg';
                            }else{
                            echo $imagem; }?>" alt="Preview"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="buttons_cadastrou">
            <a href="../index/index.php"><button type="button" class="btn btn-success btn-lg">Voltar a pagina de cadastro</button></a>
            <a href="../cadastro/cadAnimais.php"><button type="button" class="btn btn-primary btn-lg">Cadastrar mais</button></a>
            </div>
        <!-- <h1 class="cadastrou">Você cadastrou: </h1>
        <p class="cadastrou"> -->
        <?php 
        // echo "Nome: ". $nome. "<br>";
        // echo "Tutor: ". $tutor. "<br>";
        // echo "Tipo: ". $tipo. "<br>";
        // echo "Data de nascimento: ". date('d/m/Y H:i:s', strtotime($dataNasc)). "<br>";
        // echo "Imagem do animal: ". "<img src='$imagem' width='200px' alt='$nome'>"."<br>";
        ?>
</p>


<?php

?>

<h1>Erro de cadastro</h1>


<?php

?>

<?php
// if(isset($_FILES['arquivo'])){
//     $arqNome = $_FILES['arquivo'];
//     move_uploaded_file($_FILES['arquivo']['tmp_name'],"../arquivos/" . $_FILES["arquivo"]["name"]);
//     // echo "updatado";
// }
?>
    <script src="https://kit.fontawesome.com/5dfb4ac132.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>