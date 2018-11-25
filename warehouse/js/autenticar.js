$(document).ready(function() {
    $('#formAutenticar').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '../crud/autenticar.php',
            type: 'post',
            data:  new FormData(this),            
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                //alert (Number.isInteger(parseInt(data)));
                if(Number.isInteger(parseInt(data))){
                    window.location.replace("trocarsenha.php?id="+data);
                }else{
                    $('.erroautenticar').html('Informações inválidas.');                    
                }
            }        
        });
    });
});