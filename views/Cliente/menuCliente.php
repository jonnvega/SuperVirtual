    <img class="mb-4" src="./views/static/img/supermercados.jpg" class="img-thumbnail" alt="">
    <div class="bg">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Bienvenido al Menú de Cliente</a><br>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Seleccione una opción</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Mi Perfil</a>
                        <a class="dropdown-item" href="#">Visualizar productos</a>
                        <a class="dropdown-item" href="#">Consultar mis pedidos</a>
                        <a class="dropdown-item" href="#">Facturas</a>
                        <a class="dropdown-item" href="#">Historial de pedidos</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-warning my-2 my-sm-0" 
                    onClick="location.href='../../controllers/usuario_controller.php?action=salir'">Cerrar Sesión</button>
            </form>
        </div>
    </nav>
    </div>