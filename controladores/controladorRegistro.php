<?php

class ControladorRegistro {
    public function __construct(){
    }

    function registro(){
        require_once 'vistas/usuarios/registro.php';
    }

    function registrarUsuario(){
        require_once "modelos/Usuario.php";
        $nuevoUsuario = new Usuario();

        
        if($nuevoUsuario->bucarUsuario($_POST['nombre_usuario'])){
            header('Location: /VirtualWalletSpending/vistas/usuarios/usuarioExistente.php');
        }else{
            $nuevoUsuario->nombre = $_POST['nombre'];
            $nuevoUsuario->nombre_usuario = $_POST['nombre_usuario'];
            $nuevoUsuario->contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
            $nuevoUsuario->id_rol = 2;
            $nuevoUsuario->crear();
            header('Location: /VirtualWalletSpending/vistas/usuarios/registroMensaje.php');  
        }
    }


}