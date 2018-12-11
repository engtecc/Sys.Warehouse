<?php
    require_once ("bd.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $nome_produto = $_POST["txtNome"];
        $quantidade = $_POST["txtQuantidade"];
        $nome_cliente = $_POST["txtCliente"];
        $endreco = $_POST["txtCobranca"];
        $emprestimo = $_POST["dateEmprestimo"];
        $devolucao = $_POST["dateDevolucao"];
        $select = "SELECT * FROM produto where nome LIKE '%$nome_produto%'";
        $sql =  mysqli_query($conexao,$select);
        $resultado = mysqli_fetch_array($sql);
        if($resultado > 0)
        {
            $insert = "INSERT INTO temporary(nome_produto,quantidade,nome_cliente,endereco,data_devolucao,data_a_devolver) VALUES ('$nome_produto','$quantidade','$nome_cliente','$endreco','$emprestimo','$devolucao')";
            mysqli_query($conexao,$insert);
        }else{
            $_SESSION["problemaAdicionar"] = 1;
        }
        echo("entrei");
    }
    header("Location: ../paginas/emprestimo.php");
?>