<?php
class ControladorLogin{
    public function __construct(){
        session_start();
    }

    public function login(){
        require_once "vistas/usuarios/login.php";
    }

    public function verificarLogin(){
        require_once "modelos/Usuario.php";
        $usuarioLogin = new Usuario();
 
       if(isset($_SESSION['usuario'])){
            $usuarioSesion = unserialize($_SESSION['usuario']);
            $usuarioLogin = $usuarioSesion;
        }

        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        if($usuarioLogin->verificaUsuario($usuario,$contrasena)){
            $_SESSION['user'] = $_POST['usuario'];
            

            $usuarioLogin = $usuarioLogin->datosUsuario($_POST['usuario']);
            $_SESSION['usuario'] = serialize($usuarioLogin);
            //guarda en el usuario los datos y si es admin (rol 1) va a un dashboard y si no al otro (rol 2)
            if($usuarioLogin->id_rol==1){
                header('Location: ' . BASE_URL . 'dashboardAdmin');
            }else{
                header('Location: ' . BASE_URL . 'dashboard?filtro=mes&limite=' . $usuarioLogin->limite);
            }
        }else{
            header('Location: ' . BASE_URL . '?error=1');
        }
    }
    public function cerrarSesion(){
        session_unset(); // Eliminar todas las variables de sesión
        session_destroy(); // Destruir la sesión
        header('Location: ' . BASE_URL); 
    }

}