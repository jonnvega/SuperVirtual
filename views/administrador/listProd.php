<div class="container mt-5">

<button type="button" class="btn btn-outline-danger float-right"
        onClick="location.href='?action=salir'">Cerrar sesión</button>
    <br><br><br>
<button type="button" class="btn btn-outline-info float-right"
        onClick="location.href='?action=new'">Registrar producto</button>
<button type="button" class="btn btn-outline-primary float-right"
        onClick="location.href='?action=menuAdmin'">Regresar al Menú</button>

        <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>

<h1>Listado de productos</h1>
        <table class="table table-bordered table-warning">
            <thead>
                <tr>
                <th scope='col'>Código</th>
                <th scope='col'>Pasillo</th>
                <th scope='col'>Descripción</th>
                <th scope='col'>Precio</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Opciones</th>
                </tr>      
            </thead>
            <tbody>
            <?php foreach ($productos as $producto){?>
                <tr class="table-dark">
                    <th scope="row"><?php echo $producto['id']; ?></th>
                    <?php $id_pasillo = $producto['id_pasillo'];

                    if($id_pasillo==0){
                        $mensaje = 'Bebidas';
                    }else if($id_pasillo==1)
                        $mensaje = 'Lacteos';
                    }else if($id_pasillo==2){
                        $mensaje = 'Granos';
                    }else if($id_pasillo==3){
                        $mensaje = 'Carnes';
                    }else if($id_pasillo==1)
                        $mensaje = 'Limpieza';
                    }else if($id_pasillo==2){
                        $mensaje = 'Snacks';
                    }else if($id_pasillo==3){
                        $mensaje = 'Frutas y Verduras';
                    }else{
                        $mensaje = "producto sin pasillo designado";
                    }
                    ?>
                    <td><?php echo "$mensaje";?></td>
                    <td><?php echo $producto['descripción']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    
                    
                    <td>
                        <button type="button" class="btn btn-outline-info"
                        onClick="location.href='?action=editar&correo=<?php echo $producto['correo']; ?>'">
                        Editar
                        </button>

                        <button type="button" class="btn btn-outline-danger"
                        onClick="location.href='?action=eliminar&correo=<?php echo $producto['correo']; ?>'">
                        Eliminar
                        </button>
                    </td>
                </tr>
                <?php } ?>  <!--finaliza el foreach-->
            </tbody>
        </table> 
</div>