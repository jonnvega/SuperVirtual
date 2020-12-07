<form class="text-center" action="./controllers/usuario_controller.php" method="POST">
    <img class="mb-4" src="./views/static/img/logo.png" class="img-thumbnail" alt="">

        <input type="hidden" name="action" value="iniciar">
        <div class="form-group">
            <label for="correo"> Correo electronico: </label>
            <input type="text" class="form-control" id="correo" name="correo">
        </div>
        <div class="form-group">
            <label for="clave"> Digite su clave: </label>
            <input type="password" class="form-control" id="clave" name="clave">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted">&copy; Programación IV - UPI - 2020</p>
</form>
