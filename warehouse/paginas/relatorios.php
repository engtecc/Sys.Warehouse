<?php
session_start();
if(!isset($_SESSION['login'])){
    header('location: ../index.php');
}
if ($_SESSION['administrador'] != 1){
    header('location: venda.php');
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Januário - Disk Cerveja</title>        
    <meta charset="utf-8">
    <meta name="viewport"       content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"    content="WareHouse">
    <meta name="author"         content="ENGTEC - Engenharia e Computação">
    
    <link rel="icon" href="../imagens/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css" >
    <link rel="stylesheet" href="../css/estilo_relatorio.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/relatorios.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="site-header">
        <div class = "jumbotron text-center removerMargem">
            <h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
            <h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
        </div>
    </nav>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="container marketing text-center">
                <div class="row cursor">
                    <div class="col-lg-4 espacamento">
                        <a class="selecionado dia" ><img class="rounded-circle" src="../imagens/dia.png" alt="Generic placeholder image" width="100" height="100"><h5>dia</h5></a>
                    </div>
                    <div class="col-lg-4 espacamento">
                        <a class="mes" ><img class="rounded-circle" src="../imagens/mes.png" alt="Generic placeholder image" width="100" height="100"><h5>mês</h5></a>
                    </div>
                    <div class="col-lg-4 espacamento">
                        <a class="ano"><img class="rounded-circle" src="../imagens/ano.png" alt="Generic placeholder image" width="100" height="100"><h5>ano</h5></a>
                    </div>
                    <div class="col-md-12 mt-5" align="center">
                        <a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Voltar</a>
                    </div>
                </div>
            </div>
            <section id="sectionDia">
                <div class="row mt-5">
                    <div class="col-sm-12 text-center">
                        <h1>Relatório por dia</h1>
                    </div>        
                </div>

                <div class="row mt-5">
                    <div class="col-sm-12" id="tabelaDia"></div>
                </div>
            </section>

            <section id="sectionMes" style="display: none;">
                <div class="row mt-5">
                    <div class="col-sm-12 text-center">
                        <h1>Relatório por mês</h1>
                    </div>          
                </div>

                <div class="row mt-5">
                    <div class="col-sm-12" id="tabelaMes"></div>
                </div>
            </section>

            <section id="sectionAno" style="display: none;">
                <div class="row mt-5">
                    <div class="col-sm-12 text-center">
                        <h1>Relatório por ano</h1>
                    </div>          
                </div>

                <div class="row mt-5">
                    <div class="col-sm-12" id="tabelaAno"></div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>