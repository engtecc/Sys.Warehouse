$(document).ready(function() {
    $('#formLogin').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'crud/validar_acesso.php',
            type: 'post',
            data:  new FormData(this),            
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data == "errologin"){
                    $('.errologin').html('Usuário e/ou senha inválidos.');
                }else if(data == "success"){
                    window.location.replace("paginas/principal.php");
                }
            }        
        });
    });
});