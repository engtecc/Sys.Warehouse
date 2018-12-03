<?php
require_once ('bd.php');

$query = mysqli_query($conexao, "SELECT * FROM cliente as c,pessoa as p WHERE nome LIKE '%a%' and c.id_pessoa = p.id_pessoa and divida > 0 Order By nome ASC");
$num = mysqli_num_rows($query);

if($num>0){
    echo "<table class='table table-bordered table-striped text-center'>";
    echo "<thead><tr>";
    echo "<th class='text-center' style='width:60%;'>Nome</th>";
    echo "<th class='text-center' style='width:20%;'>CPF</th>";
    
    echo "</tr></thead>";
    echo "<tbody";
    while ($row = mysqli_fetch_assoc($query)){
        echo "<tr>";
        echo "<td>" .$row['nome']. "</td>";
        echo "<td>" .$row['cpf']. "</td>";
    }
    
    echo "</tbody>";
    echo "</table>";
}else{
   echo "<div align='center' class='text-error'>";
   echo "Não existe registros para esse dia";
   echo "</div>";
}

?>