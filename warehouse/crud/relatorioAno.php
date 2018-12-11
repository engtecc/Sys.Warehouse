<?php
require_once ('bd.php');

$data = date("y"); 

$query = mysqli_query($conexao, "SELECT login,nome,valor_total,tipo FROM venda as v,cliente as c, funcionario as f, pessoa as p WHERE v.id_cliente = c.id_cliente and v.id_funcionario = f.id_funcionario and c.id_pessoa = p.id_pessoa and data_horario LIKE '%$data%' ORDER by data_horario ASC");

$num = mysqli_num_rows($query);

$vtotal = 0;
if($num>0){
    echo "<table class='table table-bordered table-striped text-center'>";
    echo "<thead class='thead-dark'><tr>";
    echo "<th class='text-center' style='width:25%;'>FUNCIONÁRIO</th>";
    echo "<th class='text-center' style='width:35%;'>CLIENTE</th>";
    echo "<th class='text-center' style='width:20%;'>TIPO</th>";
    echo "<th class='text-center' style='width:20%;'>VALOR TOTAL</th>";
    
    echo "</tr></thead>";
    echo "<tbody";
    while ($row = mysqli_fetch_assoc($query)){
        echo "<tr>";
        echo "<td>" .$row['login']. "</td>";
        echo "<td>" .$row['nome']. "</td>";
        echo "<td>" .$row['tipo']. "</td>";
        echo "<td>" .$row['valor_total']. "</td>";
        $vtotal = $vtotal + $row['valor_total'];
    }

    echo "</tr>";
    echo "<td class='text-center' style='width:80%;' colspan='3'>VALOR TOTAL DO ANO:</td>";
    echo "<td class='text-center' style='width:20%;'>".$vtotal."</td>";
    
    echo "</tr>";
    
    echo "</tbody>";
    echo "</table>";
}else{
   echo "<div align='center' class='text-error'>";
   echo "Não existe registros para esse ano";
   echo "</div>";
}

?>