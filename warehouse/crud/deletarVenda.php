<?php
    session_start();
    if(isset($_GET["del"]))
    {
        $cod = $_GET["del"];        
        unset($_SESSION["dbgrid"][$cod]);	
        $cod = ($cod * 5);
        $_SESSION["valortotal"] = $_SESSION["valortotal"] - $_SESSION["dbgriddados"][$cod+4];
        unset($_SESSION["dbgriddados"][$cod]);
        $cod++;
        unset($_SESSION["dbgriddados"][$cod]);
        $cod++;
        unset($_SESSION["dbgriddados"][$cod]);
        $cod++;
        unset($_SESSION["dbgriddados"][$cod]);
        $cod++;
        unset($_SESSION["dbgriddados"][$cod]);
        
        $_SESSION["iterador"] = 1;
        $_SESSION["vendaConcluida"] = 3;
        header("location: ../paginas/venda.php");
        
    }

?>