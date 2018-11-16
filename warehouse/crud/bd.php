<?php
    
    define('BD_SERVER', 'localhost');
    define('BD_USERNAME', 'root');
    define('BD_PASSWORD', '');
    define('BD_NAME', 'warehouse');

    $conexao = new mysqli(BD_SERVER, BD_USERNAME, BD_PASSWORD, BD_NAME);
    $conexao->set_charset("utf8");
    
    if ($conexao === false){
        die("Erro ao conector com o servidor");
    }   
?>