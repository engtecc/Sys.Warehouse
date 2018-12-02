<?php
    session_start();
    require_once("bd.php");

    $codigo = $data = $quantidade = $valortotal = $fornecedor = $cnpj  = $tipo = array();
    $i = 0;
    foreach ($_SESSION["dbCompraDados"] as $key => $valor)
    {
        if($i % 7 == 0)
        {
            array_push($codigo,$valor); 
        }
        if($i % 7 == 1){
            array_push($quantidade,$valor);
        }
        if($i % 7 == 2)
        {
            array_push($valortotal,$valor);
        }
        if($i % 7 == 3)
        {
            array_push($fornecedor,$valor);
        }
        if($i % 7 == 4)
        {
            array_push($cnpj,$valor);
        }
        if($i % 7 == 5)
        {
            array_push($tipo,$valor);
        }
        if($i % 7 == 6)
        {
            array_push($data,$valor);
        }
        $i = $i +1;
    }

    $dataatual = date('y-m-d');
    $tam = count($codigo);
    $v = $_SESSION["valortotalCompra"];
    $insert = "INSERT INTO compra(cnpj,tipo,data_horario,valor_total) VALUES ('".$cnpj[0]."','".$tipo[0]."','$dataatual','$v')";
    mysqli_query($conexao,$insert);
    $id_compra = $conexao->insert_id;
    for($j = 0; $j < $tam;$j++)
    {
        $insert = "INSERT INTO entrada_produto(codigo_de_barras,id_compra,quantidade,valor_total) VALUES ('".$codigo[$j]."','".$id_compra."','".$quantidade[$j]."','".$valortotal[$j]."')";
        $select = "SELECT quantidade_estoque FROM produto WHERE codigo_de_barras = '".$codigo[$j]."'";
        $sql = mysqli_query($conexao,$select);
        $row = mysqli_fetch_array($sql);
        $q = $row["quantidade_estoque"];
        mysqli_query($conexao,$insert);
        $q = $q + $quantidade[$j];
        $update = "UPDATE produto SET quantidade_estoque = '$q' WHERE codigo_de_barras ='$codigo[$j]'";
        mysqli_query($conexao,$update);
    }
    $_SESSION["valortotalCompra"] = 0;
    $_SESSION["dbCompraDados"] = array();
    $_SESSION["dbCompra"]= array();
    $_SESSION["iteradorCompra"] = 1;
    $_SESSION["compraConcluida"] = -1;
    header("Location: ../paginas/contas.php");
?>