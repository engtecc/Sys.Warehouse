<?php

    require_once('bd.php');

    $id = $_POST['id'];
    
    $query = mysqli_query($conexao, "SELECT id_endereco FROM funcionario WHERE id_funcionario = '$id'");
    $dado = mysqli_fetch_array($query);

    $query2 = mysqli_query($conexao, "SELECT id_pessoa FROM funcionario WHERE id_funcionario = '$id'");
    $dado2 = mysqli_fetch_array($query2);

    $resultado = mysqli_query($conexao, "DELETE FROM endereco WHERE id_endereco = {$dado['id_endereco']}");
    $resultado2 = mysqli_query($conexao, "DELETE FROM funcionario WHERE id_funcionario = '$id'");
    $resultado3 = mysqli_query($conexao, "DELETE FROM pessoa WHERE id_pessoa = {$dado2['id_pessoa']}");
    

?>