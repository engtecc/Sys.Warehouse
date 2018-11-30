<?php

    require_once('bd.php');

    $codigo = $_POST['codigo'];
    $departamento = $_POST['departamento'];
    $nucleo = $_POST['nucleo'];
    $disciplina = $_POST['disciplina'];
        
    $resultado = mysqli_query($conexao, "UPDATE disciplinas SET departamento = '$departamento', nucleo = '$nucleo', disciplina = '$disciplina' WHERE codigo= '$codigo'");
        if($resultado){
            echo "concluido";
        }else{
            echo "erroeditar";
        }
?>