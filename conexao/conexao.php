<?php 
    //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPass = '';
    $dbName = 'cad_animais'; 

    $conexao = @mysqli_connect($dbHost, $dbUsername, $dbPass, $dbName ) 
	or die ("Problemas com a conexão do Banco de Dados");
	$conexao -> set_charset("utf8");

    // if(!$conexao){
    //     echo "mal";
    // }else{
    //     echo "boa";
    // }

?>


