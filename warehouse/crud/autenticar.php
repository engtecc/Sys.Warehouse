<?php

session_start();

require_once('bd.php');

$login = $_POST['login'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];

$sql = "SELECT * FROM funcionario as f, pessoa as p WHERE f.login = '$login' and p.cpf = '$cpf' and p.rg = '$rg' and f.id_pessoa = p.id_pessoa";

$resultado = $conexao->query($sql);

if($resultado){
	$dados = mysqli_fetch_array($resultado);
	$id = $dados['id_funcionario'];
	if (isset($dados['login'])) {
		echo $id;
	}else{
		echo "erroautenticar";
	}

}else{
	echo 'Erro na execução da consulta';
}

?>