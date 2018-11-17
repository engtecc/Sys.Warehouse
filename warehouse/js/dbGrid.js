alert("a");
$(document).ready(function(){
    $('#formAlterar').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '../crud/dbGrid.php',
            type: 'post',
            data:  new FormData(this),            
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data == "cadastrado"){
                    $('#modalok').modal('show');
                }else{
                    $('#modalerro').modal('show'); 
                }
            }        
        });
    });

    $(".ok").click(function(){
        window.location.replace("../paginas/pesquisar_editar.php");
    });
});

aqui
