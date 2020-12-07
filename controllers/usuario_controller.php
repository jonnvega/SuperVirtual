<?php
    class Usuario_controller{
        function  __construct(){
        }

    public function crearUsuario(){
        $usuario = new Usuario($_POST['nombre'], $_POST['correo']);
            $usuario->setClave($_POST['clave']);
            Usuario::insertUsuario($usuario);

            header('Location: ./usuario_controller.php?action=index');
    }
    public function iniciarSesion(){
        echo 'iniciarsesion';
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $usuario = Usuario::getAccess($correo,$clave);
        if(!is_null($usuario)){
            session_start();
            $_SESSION['correo'] = $usuario['correo'];
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['role'] = $usuario['role'];
            require_once './inicio_controller.php';
            //redirecciona a inicio_controller
            // header('Location: ./inicio_controller.php?action=index');
            // if($_SESSION['role'] == 0){                    //Valida el tipo de rol que se está conectando
            //     header('Location: ?action=cliente');
            // }
            // if($_SESSION['role'] == 1){ 
            //     header('Location: ../action=administrador');
            // }
            // if($_SESSION['role'] == 2){ 
            //     header('Location: ?action=empleado');
            // }
            // if($_SESSION['role'] == 3){ 
            //     header('Location: ?action=repartidor');

            // }
        }else if(is_null($usuario)){
            echo "error de usuario o contraseña";
        }
    }
    
    public function modificarUsuario(){
        $usuario = new Usuario($_POST['nombre'], $_POST['correo'], $_POST['role']);
        $usuario->setId($_POST['id']);
            Usuario::actualizarUsuario($usuario);
    }
}

require_once '../conexion.php'; 
require_once '../models/usuario_model.php';

/* a partir de aquí verifica los accesos por GET*/

if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'index':
            
            $usuarios = Usuario::readAll();
            require_once '../views/usuario/index.php';
        break;
        case 'new':
            require_once '../views/usuario/frm_insertUsuario.php';
        break;
        case 'editar':        
            $usuario = Usuario::readOnceUsuario($_GET['correo']);
            require_once '../views/usuario/frm_editarUsuario.php';
        break;
        case 'salir':
            session_start();
            session_destroy();
            header('Location: ../');
        break;
        case 'eliminar':
            $usuario = Usuario::borrarUsuario($_GET['correo']);
            header('Location: ./usuario_controller.php?action=index');
        break;
        }
    }

    /* a partir de aquí verifica los accesos por POST*/
    if (isset($_POST['action'])){
        $usuarioController = new Usuario_controller();
        switch($_POST['action']){
            case 'crear':
                $usuarioController->crearUsuario();
            break;
            case 'iniciar':                                    
                $usuarioController->iniciarSesion();
            break;
            case 'modificar':
                $usuarioController->modificarUsuario();
            break;
            } 
        } else if(isset($_POST['correo'])){
            $usuario = Usuario::readOnceUsuario($_POST['correo']);
            if(($usuario)){
                echo "1";
            }else{
                echo "0";
            }
        } 
?>