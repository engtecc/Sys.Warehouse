
<?php
include_once ("bd.php");
session_start();
$sessao = session_id();
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];

//Inclui o cadastro no mysql
$sql_inclu = "INSERT INTO usuario(nome, senha, email) VALUES
('$nome','$senha', '$email')";
$exe_inclu = mysqli_query($conexao,$sql_inclu) or die (mysqli_error());
//enviar para o email o login, senha

header('Location: teste.php');
?>