<?php

    require_once('bd.php');

    $id = $_POST['id'];
    
    $query = mysqli_query($conexao, "SELECT id_pessoa FROM cliente WHERE id_cliente = '$id'");
    $dado = mysqli_fetch_array($query);

    $query2 = mysqli_query($conexao, "SELECT id_endereco FROM cliente WHERE id_cliente = '$id'");
    $dado2 = mysqli_fetch_array($query2);

    $query3 = mysqli_query($conexao, "SELECT id_referencia_comercial FROM cliente WHERE id_cliente = '$id'");
    $dado3 = mysqli_fetch_array($query3);


 	$resultado = mysqli_query($conexao, "DELETE FROM pessoa WHERE id_pessoa = {$dado['id_pessoa']}");
    $resultado2 = mysqli_query($conexao, "DELETE FROM endereco WHERE id_endereco = {$dado2['id_endereco']}");
    $resultado3 = mysqli_query($conexao, "DELETE FROM referenci_comercial WHERE id_referencia_comercia = {$dado3['id_referencia_comercial']}");
	$resultado4 = mysqli_query($conexao, "DELETE FROM cliente WHERE id_cliente = '$id'");

?>