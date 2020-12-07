$("#btn_clientes").click(function(event){
    var parametros = { "action" : "index" };
    $.ajax({
        url: "./controllers/cliente_controller.php",
        type:"GET",
        dataType: "html",
        data: parametros,
    }).done(function(response){
        $("#contenido").html(response);
    })
})