<?php
    session_start();
    require_once("bd.php");
    if(!isset($_SESSION['login'])){
        header('location: ../index.php');
    }
    if ($_SESSION['administrador'] != 1){
        header('location: venda.php');
    }
    if($_SERVER["REQUEST_METHOD"] == "POST")
	{
        $fornecedor = $_POST["txtFornecedor"];
        $cnpj = $_POST["txtCnpj"];
        $codigo = $_POST["txtBarras"];
        $quantidade = $_POST["numQuantidade"];
        $tipo = $_POST["slcTipo"];

        $select  = "SELECT nome,preco_de_venda,quantidade_estoque from produto where codigo_de_barras = '$codigo'";
        $sql = mysqli_query($conexao,$select);
        if($tipo == "vazio")
        {
            $_SESSION["compraConcluida"] = 5;
            header("Location: ../paginas/contas.php");
        }
        if(mysqli_num_rows($sql) == 1){
            $resultado = mysqli_fetch_array($sql);
            $select = "SELECT * FROM fornecedor WHERE nome LIKE'%$fornecedor%' and cnpj LIKE '%$cnpj%'";
            $sql = mysqli_query($conexao,$select);
            $cont = mysqli_num_rows($sql);
            if($cont == 1){ 
                $nome = $resultado["nome"];
                $preco = $resultado["preco_de_venda"];
                if($_POST["numQuantidade"]!= "")
                {
                    $_SESSION["valortotalCompra"] = $_SESSION["valortotalCompra"] + ($quantidade*$preco);
                    $tabela = '
                    <tr style="text-align: center;">
                    <th style="width: 5%;">'.$_SESSION["iterador"].'</th>
                    <th style="width: 55%;">'.$nome.'</th>
                    <th style="width: 15%;">'.$preco.'</th>
                    <th style="width: 5%;">'.$quantidade.'</th>
                    <th style="width: 15%;">'.$quantidade*$preco.'</th>	
                    <th style="width:5%;"><a href="deletarCompra.php?del='.($_SESSION["iteradorCompra"]-1).'"><img src="../imagens/delete.png" style="width:25px;height:25px;"></a></th>
                    </tr>';
                        
                    array_push($_SESSION["dbCompraDados"],$codigo);
                    array_push($_SESSION["dbCompraDados"],$nome);
                    array_push($_SESSION["dbCompraDados"],$quantidade);
                    array_push($_SESSION["dbCompraDados"],$quantidade*$preco);
                    array_push($_SESSION["dbCompraDados"],$fornecedor);
                    array_push($_SESSION["dbCompraDados"],$cnpj);
                    array_push($_SESSION["dbCompra"],$tabela);

                    $_SESSION["iteradorCompra"]++;
                    $_SESSION["compraConcluida"] = 1;
                    header("Location: ../paginas/contas.php");
                }
            }
            if($cont > 1)
            {
                $_SESSION["compraConcluida"] = 3;
                header("Location: ../paginas/contas.php");
            }
            if($cont == 0)
            {
                $_SESSION["compraConcluida"] = 4;
                header("Location: ../paginas/contas.php");
            }
        }else{
            $_SESSION["compraConcluida"] = 2;
            header("Location: ../paginas/contas.php");
        }
	}
?>