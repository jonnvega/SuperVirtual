<!DOCTYPE html>
<html>
    <meta charset = "UTF-8">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, user-scalable-no,
            initial-scale=1.0 maximum-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/solar/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Lista de usuarios</title>
    </head> 
    <body>
   
        <div class="container mt-5">

        <button type="button" class="btn btn-outline-danger float-right"
                onClick="location.href='?action=salir'">Cerrar sesión</button>
         
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
                        <th scope='col'>Roll</th>
                        <th scope='col'>Opciones</th>
                       </tr>      
                    </thead>
                    <tbody>
                    <?php foreach ($pedidos as $pedido){?>
                        <tr class="table-dark">
                            <th scope="row"><?php echo $pedido['id']; ?></th>
                            <td><?php echo $pedido['nombre']; ?></td>
                            <td><?php echo $pedido['correo']; ?></td>
                            <?php $roll = $pedido['roll'];
                            if($roll==0){
                            $mensaje = 'Cliente';
                            }else if($roll==1){
                            $mensaje = 'Administrador';
                            }else if($roll==2){
                            $mensaje = 'Empleado';
                             }else if($roll==3){
                            $mensaje = 'Repartidor';
                            }else{
                                $mensaje = "pedido sin perfil designado";
                            }
                            ?>
                            <td><?php echo "$mensaje";?></td>
                            <td>
                                <button type="button" class="btn btn-outline-info"
                                onClick="location.href='?action=editar&correo=<?php echo $pedido['correo']; ?>'">
                                Editar
                                </button>

                                <button type="button" class="btn btn-outline-danger"
                                onClick="location.href='?action=eliminar&correo=<?php echo $pedido['correo']; ?>'">
                                Eliminar
                                </button>
                            </td>
                        </tr>
                        <?php } ?>  <!--finaliza el foreach-->
                    </tbody>
               </table> 
        </div>
    </body>
    
</html>