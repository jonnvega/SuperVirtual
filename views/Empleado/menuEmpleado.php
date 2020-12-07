<!DOCTYPE html>
<html>
    <meta charset = "UTF-8">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, user-scalable-no,
            initial-scale=1.0 maximum-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/spacelab/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Lista de usuarios</title>
    </head> 
    <body background-image: url(http://www.htmlhelp.com/bg.png)>
    

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Bienvenido al Menú de Empleado</a><br>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Seleccione una opción</a>
        <div class="dropdown-menu">
        
          <a class="dropdown-item" href="#">Visualizar pedidos</a>
          <a class="dropdown-item" href="../../controllers/usuario_controller.php?action=editaClave=<?php echo $usuario['correo']; ?>">Modificar mi clave</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-warning my-2 my-sm-0" 
                    onClick="location.href='../../controllers/usuario_controller.php?action=salir'">Cerrar Sesión</button>
            </form>
  </div>
</nav>
</body>