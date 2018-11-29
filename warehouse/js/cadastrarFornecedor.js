$(document).ready(function(){
    $('#formFornecedor').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '../crud/cadastrarFornecedor.php',
            type: 'post',
            data:  new FormData(this),            
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data == "errocodigo"){
                    $('#txtCnpj').focus();
                    $('.errocodigo').html('CNPJ já cadastrado.');
                }else{
                    $('#modalok').modal('show'); 
                }
            } 

        });
    });

    $(".ok").click(function(){
        window.location.replace("../paginas/cadfornecedor.php");
    });
});