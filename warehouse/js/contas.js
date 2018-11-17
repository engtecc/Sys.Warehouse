$(document).ready(function(){
    $('#formCli').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '../crud/contas.php',
            type: 'post',
            data:  new FormData(this),            
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data == "cadastrado"){
                    alert("asda");
                    $('#modalok').modal('show');
                }else if(data == "errocodigo"){
                    $('.errocodigo').html('');
                }else{
                    $('#modalerro').modal('show'); 
                }
            }        
        });
    });

    $(".ok").click(function(){
        window.location.replace("../paginas/contas.php");
    });
});
