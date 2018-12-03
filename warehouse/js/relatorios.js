$(document).ready(function() {
    $(".dia").click(function(){
        $("#sectionMes").hide();
        $("#sectionAno").hide();
        $("#sectionDia").show();
        $(".mes").removeClass("selecionado");
        $(".ano").removeClass("selecionado");
        $(".dia").addClass("selecionado");
        CarregarRelatorioDia();
    });

    $(".mes").click(function(){
        $("#sectionDia").hide();
        $("#sectionAno").hide();
        $("#sectionMes").show();
        $(".dia").removeClass("selecionado");
        $(".ano").removeClass("selecionado");
        $(".mes").addClass("selecionado");
        CarregarRelatorioMes();
    });

    $(".ano").click(function(){
        $("#sectionDia").hide();
        $("#sectionMes").hide();
        $("#sectionAno").show();
        $(".dia").removeClass("selecionado");
        $(".mes").removeClass("selecionado");
        $(".ano").addClass("selecionado");
        CarregarRelatorioAno();
    });


    
});

function CarregarRelatorioDia(){
    $.ajax({
        url: '../crud/relatorioDia.php',
        type: 'post',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            $("#tabelaDia").html(data);
        }    
    });
}

function CarregarRelatorioMes(){
    $.ajax({
        url: '../crud/relatorioMes.php',
        type: 'post',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            $("#tabelaMes").html(data);
        }    
    });
}

function CarregarRelatorioAno(){
    $.ajax({
        url: '../crud/relatorioAno.php',
        type: 'post',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            $("#tabelaAno").html(data);
        }    
    });
}