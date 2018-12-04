var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};


function pegaCodigo(codigo_de_barras){
    window.history.pushState('', '', "?codigo_de_barras="+codigo_de_barras);
}

function pegaCodigo2(cnpj){
    window.history.pushState('', '', "?cnpj="+cnpj);
}

function pegaCodigo3(id){
    window.history.pushState('', '', "?id="+id);
}

function pegaCodigo4(id){
    window.history.pushState('', '', "?id="+id);
}

function pegaCodigo5(id){
    window.history.pushState('', '', "?id="+id);
}


$(document).ready(function(){
    $(".confirmarExcluirProduto").click(function(){
        var codigo_de_barras = getUrlParameter('codigo_de_barras');
        $.ajax({
            url: '../crud/excluirProduto.php',
            type: 'post',
            data: {codigo_de_barras: codigo_de_barras},
            success: function(data){
                $('#modalConfirmacaoProduto').modal('hide');
                $('#modalok').modal('show');
            }        
        });
    });

    $(".confirmarExcluirFornecedor").click(function(){
        var cnpj = getUrlParameter('cnpj');
        $.ajax({
            url: '../crud/excluirFornecedor.php',
            type: 'post',
            data: {cnpj: cnpj},
            success: function(data){
                $('#modalConfirmacaoFornecedor').modal('hide');
                $('#modalok').modal('show');
            }        
        });
    });

    $(".confirmarExcluirFuncionario").click(function(){
        var id = getUrlParameter('id');
        $.ajax({
            url: '../crud/excluirFuncionario.php',
            type: 'post',
            data: {id: id},
            success: function(data){
                $('#modalConfirmacaoFuncionario').modal('hide');
                $('#modalok').modal('show');
            }        
        });
    });

    $(".confirmarExcluirCliente").click(function(){
        var id = getUrlParameter('id');
        $.ajax({
            url: '../crud/excluirCliente.php',
            type: 'post',
            data: {id: id},
            success: function(data){
                $('#modalConfirmacaoCliente').modal('hide');
                $('#modalok').modal('show');
            }        
        });
    });

        $(".confirmarExcluirEmprestimo").click(function(){
        var id = getUrlParameter('id');
        $.ajax({
            url: '../crud/excluirEmprestimo.php',
            type: 'post',
            data: {id: id},
            success: function(data){
                $('#modalConfirmacaoEmprestimo').modal('hide');
                $('#modalok').modal('show');
            }        
        });
    });

    $(".ok").click(function(){
        window.location.reload();
    });

    $(".voltarconsulta").click(function(){
        window.location.replace("../paginas/pesquisar_editar.php");
    });
});