
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Bienvenido al Menú de Administrador</a><br>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Seleccione una opción</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="../../controllers/usuario_controller.php?action=index">Usuarios registrados</a>
          <a class="dropdown-item" href="#">Registar productos</a>
          <a class="dropdown-item" href="#">Inventario</a>
          <a class="dropdown-item" href="#">Control de pedidos</a>
          <a class="dropdown-item" href="#">Control de cajas</a>
          <a class="dropdown-item" href="../../controllers/usuario_controller.php?action=editaClave=<?php echo $usuario['correo']; ?>">Modificar mi clave</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-danger my-2 my-sm-0" 
                    onClick="location.href='../../controllers/usuario_controller.php?action=salir'">Cerrar Sesión</button>
    </form>
  </div>
</nav>
