<?php
require_once ('bd.php');

$codigo_de_barras = $nome = $preco_de_venda = $preco_de_compra = $quantidade_estoque = $validade = "";
echo("entrei");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$codigo_de_barras = $_POST["txtCodigoBarras"];
	$nome = $_POST["txtNome"];
	$preco_de_venda = $_POST["txtPrecoVenda"];
	$preco_de_compra = $_POST["txtPrecoCompra"];
	$quantidade_estoque = $_POST["txtQuantidade"];
	$validade = $_POST["txtValidade"];

	$sql = "UPDATE produto SET codigo_de_barras = '$codigo_de_barras', nome ='$nome', preco_de_venda = '$preco_de_venda',preco_de_compra= '$preco_de_compra',quantidade_estoque = '$quantidade_estoque' ,validade ='$quantidade_estoque' where codigo_de_barras = '$codigo_de_barras'";

	if($stmt = $conexao->prepare($sql))
	{
		if($stmt->execute())
		{
			echo "cadastrado";
		}else{
			echo "errocodigo";
		}
	}
	

	$stmt->close();
	$conexao->close();
}
?>