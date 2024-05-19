<?php

class ControladorConfiguracion{
    public function __construct(){
        require_once 'modelos/Usuario.php';
        session_start();
    }

    function abrirConfiguracion(){
        $usuario = unserialize($_SESSION['usuario']);

        require_once 'vistas/configuracion.php';
    }

    function nuevoLimite(){
        $usuario = unserialize($_SESSION['usuario']);

        $usuario->actualizaLimite($_POST['limite']);

        $usuario = $usuario->datosUsuario($usuario->nombre_usuario);

        $_SESSION['usuario'] = serialize($usuario);

        header('Location: /VirtualWalletSpending/configuracion');
    }
}