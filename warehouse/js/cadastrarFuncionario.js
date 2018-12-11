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
                if(data == "falha"){
                    $('.errosenha').html('As senhas não correspondem!');
                }else if(data == "cadastrado"){
                    $('#modalok').modal('show');
                }else if(data == "errocodigo"){
                    $('#modalerro').modal('show');
                }
            }  

        });
    });

    $(".ok").click(function(){
        window.location.replace("../paginas/cadFuncionario.php");
    });
});