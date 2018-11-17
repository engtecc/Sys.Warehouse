<?php
    include_once('../crud/bd.php');
    $sql = mysqli_query($conexao,"SELECT codigo_de_barras,nome from produto where nome='asd'");

    $dyn_table = '<table border="1" cellpadding="10">';
    while($row = mysqli_fetch_array($sql)){
        $id = $row["codigo_de_barras"];
        $nome = $row["nome"];

        $dyn_table .= '<tr><td>'.$nome. '</td>';
        $dyn_table .= '<td>' .$id. '</td>';
    }
    $dyn_table .= '</tr></table>';
?>

<html>
    <body>
        <h3>PHP Grid dinamico</h3>
        <?php echo $dyn_table;?>
    </body>
</html>