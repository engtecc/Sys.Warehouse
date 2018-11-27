<?php
    session_start();
    require_once("bd.php");

    $nome = $codigo = $data = $quantidade = $valortotal = array();
    $i = 0;
    foreach ($_SESSION["dbgriddados"] as $key => $valor)
    {
        if($i % 4 == 0)
        {
            array_push($codigo,$valor); 
        }
        if($i % 4 == 1){
            array_push($nome,$valor);
        }
        if($i % 4 == 2)
        {
            array_push($data,$valor);
        }
        if($i % 4 == 3)
        {
            array_push($quantidade,$valor);
        }
        if($i % 5 == 4)
        {
            array_push($valortotal,$valor);
        }
        $i = $i +1;
    }
    $select = "SELECT max(id_venda) from venda";
    $sql= mysqli_query($conexao,$select); 
    $resultado = mysqli_fetch_array($sql);
    echo($resultado["id_venda"]);
    $tamanho = count($nome);
    
?>