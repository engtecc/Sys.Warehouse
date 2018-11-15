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
                alert(data);
                if(data == "cadastrado"){
                    $('#modalok').modal('show');
                }else if(data == "errocodigo"){
                    $('.errocodigo').html('CNPJ já cadastrado.');
                }else{
                    $('#modalerro').modal('show'); 
                }
            }        
        });
    });

    $(".ok").click(function(){
        window.location.replace("../paginas/cadfornecedor.php");
    });
});
