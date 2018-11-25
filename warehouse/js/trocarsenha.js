$(document).ready(function() {
    $('#formTrocarSenha').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '../crud/trocarsenha.php',
            type: 'post',
            data:  new FormData(this),            
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data == "falha"){
                    $('.errosenha').html('As senhas não correspondem!');
                }else if(data == "alterada"){
                    $('#modalok').modal('show');
                }else if(data == "erro"){
                    $('#modalerro').modal('show');
                }
            }       
        });
    });
    
    $('.ok').click(function(){
        window.location.replace("../index.php");
    });
});