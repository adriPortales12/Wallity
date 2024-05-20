<?php
class ControladorPerfil{
    public function __construct(){
        require_once 'modelos/Usuario.php';
        session_start();
    }

    function abrirPerfil(){
        $usuario = unserialize($_SESSION['usuario']);

        require_once 'vistas/perfil.php';
    }

    function cambioNombres(){
        $usuario = unserialize($_SESSION['usuario']);
        $usuario->nombre = $_POST['nombre'];
        $usuario->nombre_usuario = $_POST['nombre_usuario'];
        $usuario->actualizarNombres();
        $_SESSION['usuario'] = serialize($usuario);
        $_SESSION['user'] = $usuario->nombre_usuario;


        header('Location:' . BASE_URL . 'perfil');
    }

    function cambioContrasena(){
        $usuario = unserialize($_SESSION['usuario']);
        $usuario->contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
        $usuario->actualizarContrasena();
        $_SESSION['usuario'] = serialize($usuario);

        header('Location: ' . BASE_URL . 'perfil');
    }
}