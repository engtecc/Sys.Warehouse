<?php
require_once ('bd.php');

$pesquisar = $_POST['pesquisar'];

$query = mysqli_query($conexao, "SELECT * FROM cliente as c,pessoa as p WHERE nome LIKE '%$pesquisar%' and c.id_pessoa = p.id_pessoa and divida > 0 Order By nome ASC");
$num = mysqli_num_rows($query);

if($num>0){
    echo "<br><table class='table table-bordered table-striped text-center'>";
    echo "<thead class='thead-dark'><tr>";
    echo "<th class='text-center' style='width:60%;'>Nome</th>";
    echo "<th class='text-center' style='width:20%;'>Dívida</th>";
    echo "<th class='text-center' style='width:20%;'>Editar</th>";
    echo "</tr></thead>";
    echo "<tbody";
    while ($row = mysqli_fetch_assoc($query)){
        echo "<tr>";
        echo "<td>" .$row['nome']. "</td>";
        echo "<td>" .$row['divida']. "</td>";
        echo "<td class='text-center align-middle'><a href='lancarpagamento2.php?id=".$row['id_cliente']."'title='Editar' data-toggle='tooltip''><img src='../svg/editar.svg' width='25' height='25'></a>";
    }
    
    echo "</tbody>";
    echo "</table>";
}else{
   echo "<div align='center' class='text-error'><br>";
   echo "Cliente não encontrado!";
   echo "</div>";
}
?>