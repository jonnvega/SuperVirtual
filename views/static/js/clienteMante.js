$("#frmManteCliente").submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "./controllers/cliente_controller.php",
        dataType: "html",
        data: parametros,
        beforeSend:function(objeto){
            $("#mensajes").html("Almacenando datos");
        },
        success: function(response){
            $("#contenido").html(response);
        }
    })
    event.preventDefault();
})