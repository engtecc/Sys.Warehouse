$(document).ready(function() {
    $('#formTrocarSenha').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '../crud/trocarsenha.php',
            type: 'post',
            data:  $(this).serialize(),            
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                echo($data);
                if(data == "falha"){
                    $('.errosenha').html('As senhas não correspondem!');
                }else if(data == "alterada"){
                    $('#modalok').modal('show');
                }else{
                    $('#modalerro').modal('show');
                }
            }       
        });
    });
    
    $('.ok').click(function(){
        window.location.replace("../index.php");
    });
});