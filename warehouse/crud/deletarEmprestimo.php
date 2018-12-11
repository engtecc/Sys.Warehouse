<?php

    require_once('bd.php');

    $id = $_GET['cod'];
     
     $resultado = mysqli_query($conexao, "DELETE FROM emprestimo WHERE id_emprestimo = '$id'");
     header('Location: ../crud/devolverEmprestimo.php');
?>