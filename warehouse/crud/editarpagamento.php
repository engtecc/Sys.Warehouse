<?php

    require_once('bd.php');

    $codigo = $_POST['nome'];
    $divida = $_POST["faltapagar"];
        
    $resultado = mysqli_query($conexao, "UPDATE cliente SET divida = '$divida' WHERE nome = '$codigo'");
        if($resultado){
            echo "concluido";
        }else{
            echo "erroeditar";
        }
?>