function fnEditar(info){
    let idAbonado = info.value;
    var parametros={"action":"editar","idAbonado":idAbonado};
    console.log("action=> "+parametros.action);
    console.log("idAbonado=> "+parametros.idAbonado);

    $.ajax({
        type:"GET",
        url: "./controllers/abonado_controller.php",
        dataType: "html",
        data: parametros,
        beforeSend:function(response){
            $("#mensajes").html("Buscando abonado");
        },
        success: function(response){
            $("#contenido").html(response);
        }
    })
}