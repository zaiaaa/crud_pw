<?php
    include('../conexao/conexao.php');
    if(!empty($_GET['id'])){
        $id = $_GET['id'];

        $querySql = mysqli_query($conexao, "SELECT * FROM animais WHERE id=$id ");
        $res = mysqli_fetch_array($querySql);
        // $imagem = $res['foto'];
        //var_dump($querySql);
        if($querySql->num_rows > 0){
            $sqlDelete = mysqli_query($conexao, "DELETE FROM animais WHERE id=$id");
            $imagem = $res['foto'];
            if($imagem != "sem_imagem.jpg"){
            unlink('../arquivos/'.$imagem); 
            }
        }
    }
    header('Location: ../index/index.php')

//var_dump($querySql);
?>