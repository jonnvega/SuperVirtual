<?php
if(isset($_SESSION['id'])){
    switch($_SESSION['role']){
        case '0' : 
            require_once './views/cliente/menuCliente.php'; 
        break;
        case '1' :
            require_once './views/administrador/menuAdmin.php'; 
        break;
        case '2' : 
            require_once './views/empleado/menuEmpleado.php'; 
        break;
        case '3' : 
            require_once './views/repartidor/menuRepartidor.php'; 
        break;
    }
}else{
    require_once './views/usuario/frm_login.php';
}
?>
