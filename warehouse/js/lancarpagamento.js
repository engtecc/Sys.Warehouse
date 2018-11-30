$(document).ready(function() {
    $("#pesquisar").keyup(function(){
        var curso = $('#capture').val();
        var pesquisar = $("#pesquisar").val();
        $.post('../crud/lancarpagamento.php', {pesquisar: pesquisar, curso: curso},function(data){
            $('.tabelaOcultar').hide();
            $("#result").html(data);     
        });
    });

    $('#formEditar').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '../crud/editarlancamento.php',
            type: 'post',
            data:  new FormData(this),            
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data == "erroeditar"){
                    $('#modalerror').modal('show');
                }else{
                    $('#modalok').modal('show'); 
                }
            }        
        });
    });
    
    $(".ok").click(function(){
        window.location.replace("../paginas/lancarpagamento.php");
    });

    $(function() {
        $('#divida').maskMoney({ decimal: '.', thousands: '', precision: 2 });
  });
});

function calcularDivida(){
    var valor1 = parseFloat((document.getElementById('divida').value).replace(',', '.'));
    var valor2 = parseFloat((document.getElementById('pagar').value).replace(',', '.'));
    total = parseFloat(valor1 - valor2).toFixed(2);
    document.getElementById('faltapagar').value = total.replace(',', '.');
}