$("#correo").focus(function(event){
    $("#correo").removeClass("is-invalid");
    $("#correo").removeClass("is-valid");
    $("#btnSubmit").removeAttr("disabled");
})

$("#correo").blur(function(event){
    $("#errorCorreo").html("");
    var parametros = $(this).serialize();
    $.ajax({
        url:"./usuario_controller.php",
        type: "POST",
        dataType: "html",
        data: parametros,
    }).done(function(response){
        if(response==1){
            $("#correo").addClass("is-invalid");
            $("#btnSubmit").attr("disabled",true);
        }else{
            $("#correo").addClass("is-valid");
        }
    })  
})