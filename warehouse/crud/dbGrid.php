<?php
require_once ('bd.php');
$tablea_grid_dinamica ="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$radioValue = $_POST["radioPesquisar"];
	echo ($radioValue);
    $sql = mysqli_query($conexao,"SELECT codigo_de_barras,nome from produto where nome='asd'");

	$tablea_grid_dinamica = '<table cellpadding="10px" class="table table-condensed table-hover">';
	$tablea_grid_dinamica .= '<tr class="active"><td><b>Código de barras</b></td><td><b>Nome</b></td></tr>';

    while($row = mysqli_fetch_array($sql)){
        $id = $row["codigo_de_barras"];
        $nome = $row["nome"];

        $tablea_grid_dinamica .= '<tr><td>'.$nome. '</td>';
        $tablea_grid_dinamica .= '<td>' .$id. '</td>';
    }
	$tablea_grid_dinamica .= '</tr></table>';
}
?>