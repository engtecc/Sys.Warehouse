<?php

    require_once('bd.php');

    $codigo_de_barras = $_POST['codigo_de_barras'];

    $resultado = mysqli_query($conexao, "DELETE FROM produto WHERE codigo_de_barras = '$codigo_de_barras'");


?>