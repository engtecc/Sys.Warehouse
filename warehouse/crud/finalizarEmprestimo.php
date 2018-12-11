<?php
    require_once "bd.php";
    session_start();
    $select = "SELECT * FROM temporary";
    $resultado = mysqli_fetch_array(mysqli_query($conexao,$select));
    if($resultado > 0 )
    {
        $insert = "INSERT INTO emprestimo (data_devolucao,data_a_devolver, Nome, endereco) SELECT data_devolucao,data_a_devolver,nome_cliente,endereco FROM temporary";
        mysqli_query($conexao,$insert);
        $drop = "DROP TABLE temporary";
        mysqli_query($conexao,$drop);
        $create = "CREATE TABLE `temporary` (id_emprestimo int not null AUTO_INCREMENT PRIMARY KEY,data_devolucao date,data_a_devolver date,nome_cliente varchar(200),endereco varchar(300),nome_produto varchar(300),quantidade int);";
        mysqli_query($conexao,$create);
        $_SESSION["falhaEmprestimo"] = 2;
    }else{
        $_SESSION["falhaEmprestimo"] = 1;
    }
    header('Location: ../paginas/emprestimo.php');
?>