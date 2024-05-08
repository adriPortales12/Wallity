<?php
class ControladorLogin{
    public function __construct(){
        session_start();
    }

    public function login(){
        require_once "vistas/login.php";
    }

    public function verificarLogin(){
        require_once "modelos/Usuario.php";
        $usuarioLogin = new Usuario();
 
       if(isset($_SESSION['usuario'])){
            $usuarioSesion = unserialize($_SESSION['usuario']);
            $usuarioLogin = $usuarioSesion;
        }

        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        if($usuarioLogin->verificaUsuario($usuario,$contraseña)){
            $_SESSION['usuario'] = serialize($usuarioLogin);
            header('Location: /VirtualWalletSpending/dashboard');
        }else{
            header('Location: /VirtualWalletSpending/');
        }
    }
    public function cerrarSesion(){
        session_unset(); // Eliminar todas las variables de sesión
        session_destroy(); // Destruir la sesión
        header('Location: /VirtualWalletSpending/'); 
    }

}