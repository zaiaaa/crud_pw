<?php 
    include('../conexao/conexao.php');
    
    $id = $_GET['id'];

    // $nome = $_POST['nome'];
    // $tutor = $_POST['nomeTutor'];
    // $tipo = $_POST['tipo'];
    // $dataNasc = $_POST['dataNasc'];




    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $tutor = $_POST['nomeTutor'];
        $tipo = $_POST['tipo'];
        $dataNasc = $_POST['dataNasc'];
        $fotoAntiga = $_POST['arq_antigo'];
     }else 
     {
         header('Location: invalidForm.php');
     }
     
     $pasta = "../arquivos/";
     $nomeDoArquivo = $_FILES['arquivo']['name'];
     $novoNomeDoArquivo = uniqid();
     $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
     $imagem = $pasta . $novoNomeDoArquivo . "." . $extensao;
     $certo = move_uploaded_file($_FILES['arquivo']['tmp_name'], $imagem);
         
     if($certo){
        unlink($fotoAntiga);
        $query = mysqli_query($conexao, "UPDATE animais SET nome = '$nome', tutor = '$tutor', tipo = '$tipo', data_nasc = '$dataNasc', foto = '$imagem' WHERE id=$id");
     }else{
        $query = mysqli_query($conexao, "UPDATE animais SET nome = '$nome', tutor = '$tutor', tipo = '$tipo', data_nasc = '$dataNasc' WHERE id=$id");
     }
     if(empty($imagem)){
     }else{
        
    }

    header('Location: ../index/index.php')



?>