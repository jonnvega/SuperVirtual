<div class="container mt-5">

<button type="button" class="btn btn-outline-danger float-right"
        onClick="location.href='?action=salir'">Cerrar sesión</button>
    <br><br><br>
<button type="button" class="btn btn-outline-info float-right"
        onClick="location.href='?action=new'">Registrar usuario</button>
<button type="button" class="btn btn-outline-primary float-right"
        onClick="location.href='?action=menuAdmin'">Regresar al Menú</button>

        <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>

<!<h1>Listado de usuarios</h1>
        <table class="table table-bordered table-warning">
            <thead>
                <tr>
                <th scope='col'>id</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Correo</th>
                <th scope='col'>Rol</th>
                <th scope='col'>Opciones</th>
                </tr>      
            </thead>
            <tbody>
            <?php foreach ($usuarios as $usuario){?>
                <tr class="table-dark">
                    <th scope="row"><?php echo $usuario['id']; ?></th>
                    <td><?php echo $usuario['nombre']; ?></td>
                    <td><?php echo $usuario['correo']; ?></td>
                    <?php $role = $usuario['role'];

                    if($role==0){
                        $mensaje = 'Cliente';
                    }else if($role==1)
                    $mensaje = 'Administrador';
                    }else if($role==2){
                    $mensaje = 'Empleado';
                }else if($role==3){
                    $mensaje = 'Repartidor';
                    }else{
                        $mensaje = "Usuario sin perfil designado";
                    }
                    ?>
                    <td><?php echo "$mensaje";?></td>
                    <td>
                        <button type="button" class="btn btn-outline-info"
                        onClick="location.href='?action=editar&correo=<?php echo $usuario['correo']; ?>'">
                        Editar
                        </button>

                        <button type="button" class="btn btn-outline-danger"
                        onClick="location.href='?action=eliminar&correo=<?php echo $usuario['correo']; ?>'">
                        Eliminar
                        </button>
                    </td>
                </tr>
                <?php } ?>  <!--finaliza el foreach-->
            </tbody>
        </table> 
</div>