<?php

    require_once('bd.php');

    $id = $_POST['id'];

    $resultado = mysqli_query($conexao, "DELETE FROM emprestimo WHERE id_emprestimo = '$id'");


?>