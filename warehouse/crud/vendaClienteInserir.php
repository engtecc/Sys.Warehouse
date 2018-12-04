<?php
    session_start();
    require_once("bd.php");

    $nome = $codigo = $data = $quantidade = $valortotal = array();
    $i = 0;
    foreach ($_SESSION["dbgriddados"] as $key => $valor)
    {
        if($i % 5 == 0)
        {
            array_push($codigo,$valor); 
        }
        if($i % 5 == 1){
            array_push($nome,$valor);
        }
        if($i % 5 == 2)
        {
            array_push($data,$valor);
        }
        if($i % 5 == 3)
        {
            array_push($quantidade,$valor);
        }
        if($i % 5 == 4)
        {
            array_push($valortotal,$valor);
        }
        $i = $i +1;
    }
    $key = $_GET["key"];
    $limite = $_GET["limite"];
    $dataatual = date('y-m-d');
    $tam = count($nome);
    $v = $_SESSION["valortotal"];
    $id_funcionario = $_SESSION["id_funcionario"];
    $select  = "SELECT id_cliente FROM cliente as c,(SELECT id_pessoa FROM pessoa WHERE nome LIKE '%$key%' OR cpf LIKE '%$key%') as p WHERE c.id_pessoa = p.id_pessoa";
    $row = mysqli_fetch_array(mysqli_query($conexao,$select));
    $id_cliente = $row["id_cliente"];
    $tipo = $_GET["tipo"];
    $divida = $_GET["divida"];
    echo($divida);
    if($tipo == "prazo")
    {
        $update = "UPDATE cliente set limite_de_credito = '$limite', divida='$divida' WHERE id_cliente = '$id_cliente'";
        echo('entrei');
        mysqli_query($conexao,$update);
    }
    $insert = "INSERT INTO venda(id_funcionario,id_cliente,data_horario,tipo,valor_total) VALUES ('$id_funcionario','$id_cliente','$dataatual','$tipo','$v')";
    mysqli_query($conexao,$insert);
    $id_venda = $conexao->insert_id;
    for($j = 0; $j < $tam;$j++)
    {
        $insert = "INSERT INTO saida_produto(codigo_de_barras,id_venda,quantidade,valor_total) VALUES ('".$codigo[$j]."','".$id_venda."','".$quantidade[$j]."','".$valortotal[$j]."')";
        $select = "SELECT quantidade_estoque FROM produto WHERE codigo_de_barras = '".$codigo[$j]."'";
        $sql = mysqli_query($conexao,$select);
        $row = mysqli_fetch_array($sql);
        $q = $row["quantidade_estoque"];
        if($q >= $quantidade[$j]){
            mysqli_query($conexao,$insert);
            $q = $q - $quantidade[$j];
            $update = "UPDATE produto SET quantidade_estoque = '$q' WHERE codigo_de_barras ='$codigo[$j]'";
            mysqli_query($conexao,$update);
        }else{
            $_SESSION["vendaConcluida"] = 2;
            header("Location: ../paginas/venda.php");
        }
    }
    $_SESSION["valortotal"] = 0;
    $_SESSION["dbgriddados"] = array();
    $_SESSION["dbgrid"]= array();
    $_SESSION["iterador"] = 1;
    $_SESSION["vendaConcluida"] = 1;
    header("Location: ../paginas/venda.php");
?>