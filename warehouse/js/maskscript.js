$(document).ready(function() {
    $("#txtCpf").mask("000.000.000-00")

    $("").mask("000.000.000-00")

    $("#txtTelefone").mask("(00) 0000-00009")

    $("#txtTelefone").blur(function(event){
        if($(this).val().length == 15){
            $("#txtTelefone").mask("(00) 00000-0009")
        } else{
            $("#txtTelefone").mask("(00) 0000-00009")
        }
    })
    $("#txtTelefone_representante").mask("(00) 0000-00009")
    $("#txtTelefone_representante").blur(function(event){
        if($(this).val().length == 15){
            $("#txtTelefone_representante").mask("(00) 00000-0009")
        } else{
            $("#txtTelefone_representante").mask("(00) 0000-00009")
        }
    })
    $("#txtNumero").mask("999990A", {
        translation: {
            A: {
                pattern: /[0-9A-Za-z]/
            }
        }, reverse: true
    })
    $('#txtRG').mask("999.999.999-X",{
        translation: {
            X: {
                pattern: /[X0-9]/
            }
        }, reverse: true
    })
    $("#txtCnpj").mask("99.999.999/9999-99")
    $("#txtPrecoCompra").mask("999.999.999.999.90", {reverse: true})
    $("#txtPrecoVenda").mask("999.999.999.999.90", {reverse: true})
    
});