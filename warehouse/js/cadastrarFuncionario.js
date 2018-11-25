$(document).ready(function(){
    $('#formFuncionario').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '../crud/cadastrarFuncionario.php',
            type: 'post',
            data:  new FormData(this),            
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                alert (data);
                if(data == "errocodigo"){
                    $('#txtCnpj').focus();
                    $('.errocodigo').html('CPF já cadastrado.');
                }else{
                    $('#modalok').modal('show'); 
                }
            } 

        });
    });

    $(".ok").click(function(){
        window.location.replace("../paginas/cadFuncionario.php");
    });
});