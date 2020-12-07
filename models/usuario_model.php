<?php
class Usuario{
        private $id;
        private $correo;
        private $nombre;
        private $clave;
        private $role;
         
        public function __construct($nombre, $correo, $role){
            $this->nombre = $nombre;
            $this->correo = $correo;
        } 

            //crea todos los GET y SET de las variables a considerar

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
        public function getNombre()
        {
                return $this->nombre;
        }
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }
        public function getCorreo()
        {
                return $this->$correo;
        }
        public function setCorreo($correo)
        {
                $this->correo = $correo;

                return $this;
        } 
        public function getClave()
        {
                return $this->clave;
        }
        public function setClave($clave)
        {
                $this->clave = $clave;

                return $this;
        }
         public function getRole()
        {
                return $this->role;
        }
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }

        public static function insertUsuario($user){
                try{
                        $db = Db::getConnect(); //llama la conexion
                        $db->beginTransaction();  //inicia la transacción de datos
                        $consulta = $db->prepare("INSERT INTO tbl_usuarios (nombre, correo, clave, role) "
                        . "VALUES (:nombre, :correo, :clave, :role)");
                        $consulta->bindValue(':nombre',$user->getNombre());
                        $consulta->bindValue(':correo',$user->getCorreo());
                        //$clave = password_hash($user->getClave(), PASSWORD_DEFAULT);
                        //$consulta->bindValue(':clave',$clave);
                        $consulta->bindValue(':clave',$user->getClave());
                        $consulta->bindValue(':role',$user->getidRole());
                        $consulta->execute();
                        $db->commit();
                }catch(PDOException $e){
                        echo "Se ha presentado un error en DB ".$e->getMessage();
                        $db->roleBack;
                        throw $e;
                }
        }

        public static function getAccess($correo,$clave){
                try{
                        
                        $db = Db::getConnect();
                        $consulta = $db->prepare("SELECT * FROM tbl_usuarios WHERE correo =:correo");
                        $consulta->bindValue(':correo',$correo);
                        $consulta->execute();
                        $usuario = $consulta->fetch();
                        if(password_verify($clave, $usuario['clave'])){
                                $usuario = new Usuario($usuario['nombre'], $usuario['correo'], $usuario['role']);
                                $usuario->setId($usuario['id']);
                                $usuario->setClave($usuario['clave']);
                                $usuario->setidPerfil($usuario['role']);
                        }
                        return $usuario;
                }
                catch(PDOException $e){
                        echo "Se ha presentado un error en DB ".$e->getMessage();
                        $db->roleBack;
                        throw $e;
                }

        }


        public static function readOnceUsuario($correo){
                try{
                        $db = Db::getConnect();
                        $consulta = $db->prepare("SELECT * FROM tbl_usuarios WHERE correo = :correo");
                        $consulta->bindValue(':correo',$correo);
                        $consulta->execute();
                        $usuario = $consulta->fetch(); 
                        return $usuario;   
                }catch(PDOException $e){
                        echo "Se ha presentado un error en DB ".$e->getMessage();
                        $db->roleBack;
                        throw $e;
                }

        }

        public static function readAll(){
                $usuarios=[]; //arreglo
                try{
                        $db = Db::getConnect();
                        $consulta = $db->prepare("SELECT * from tbl_usuarios");
                        $consulta->execute();
                        foreach($consulta->fetchAll() as $usuario){
                                $usuarios[]=$usuario;
                        }
                        return $usuarios;
                } catch (PDOException $e) {
                        echo "se ha presentado un error". $e->getMessage();
                        throw $e;
                }
                
        }

        public static function actualizarUsuario($u){
                try{
                        $db = Db::getConnect(); //llama la conexion
                        $db->beginTransaction();  //inicia la transacción de datos
                        $consulta = $db->prepare("UPDATE tbl_usuarios SET nombre = :nombre, correo = :correo, role = :role WHERE id =:id");
                        $consulta->bindValue(':nombre',$u->getNombre());
                        $consulta->bindValue(':correo',$u->getCorreo());
                        $consulta->bindValue(':role',$u->getidPerfil());
                        $consulta->bindValue(':id',$u->getId());
                        $consulta->execute();//ejecuta la consulta
                        $db->commit();//verifica la ejecución
                }catch(PDOException $e){
                        echo "Se ha presentado un error en DB ".$e->getMessage();
                        $db->roleBack;
                        throw $e;
                }
        }

        public static function actualizarClave($u){
                try{
                        $db = Db::getConnect(); 
                        $db->beginTransaction();
                        $consulta = $db->prepare("UPDATE tbl_usuarios SET clave =:clave WHERE id =:id");
                        $consulta->bindValue(':idClave',$u->getClave());
                        $consulta->bindValue(':id',$u->getId());
                        $consulta->execute();
                        $db->commit();
                }catch(PDOException $e){
                        echo "Se ha presentado un error en DB ".$e->getMessage();
                        $db->roleBack;
                        throw $e;
                }
        }

        public static function borrarUsuario($correo){
                try{
                        $db = Db::getConnect();
                        $consulta = $db->prepare("DELETE FROM tbl_usuarios WHERE correo = :correo");
                        $consulta->bindValue(':correo', $correo);
                        $consulta->execute();
                        $usuario = $consulta->fetch();
                }catch(PDOException $e){
                        echo "Se ha presentado un error en DB ".$e->getMessage();
                        throw $e;
                }
                return true;
        }

    }
?>