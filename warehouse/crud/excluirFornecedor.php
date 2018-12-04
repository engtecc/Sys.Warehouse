<?php

    require_once('bd.php');

    $cnpj = $_POST['cnpj'];
    
    $query = mysqli_query($conexao, "SELECT id_endereco FROM fornecedor WHERE cnpj = '$cnpj'");
    $dado = mysqli_fetch_array($query);

    $resultado = mysqli_query($conexao, "DELETE FROM endereco WHERE id_endereco = {$dado['id_endereco']}");
    $resultado2 = mysqli_query($conexao, "DELETE FROM fornecedor WHERE cnpj = '$cnpj'");
    

?>