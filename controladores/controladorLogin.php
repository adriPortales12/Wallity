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
            $_SESSION['usuario'] = serialize($usuarioLogin);
            header('Location: /VirtualWalletSpending/dashboard');
        }else{
            
            echo '<script>alert("Inicio de sesión fallido");</script>';
            
            require_once "vistas/usuarios/login.php";
        }
    }
    public function cerrarSesion(){
        session_unset(); // Eliminar todas las variables de sesión
        session_destroy(); // Destruir la sesión
        header('Location: /VirtualWalletSpending/'); 
    }

}