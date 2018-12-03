<?php
    session_start();
    if(isset($_GET["del"]))
    {
        $cod = $_GET["del"];        
        unset($_SESSION["dbCompra"][$cod]);	
        $cod = ($cod * 7);
        $_SESSION["valortotalCompra"] = $_SESSION["valortotalCompra"] - $_SESSION["dbCompraDados"][$cod+2];
        unset($_SESSION["dbCompraDados"][$cod]);
        $cod++;
        unset($_SESSION["dbCompraDados"][$cod]);
        $cod++;
        unset($_SESSION["dbCompraDados"][$cod]);
        $cod++;
        unset($_SESSION["dbCompraDados"][$cod]);
        $cod++;
        unset($_SESSION["dbCompraDados"][$cod]);
        
        $_SESSION["iteradorCompra"]--;
        header("location: ../paginas/contas.php");
        $_SESSION["compraConcluida"] = 6;
    }

?>