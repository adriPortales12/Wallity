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
            header('Location: ' . BASE_URL . 'registroKO');
        }else{
            $nuevoUsuario->nombre = $_POST['nombre'];
            $nuevoUsuario->nombre_usuario = $_POST['nombre_usuario'];
            $nuevoUsuario->contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
            $nuevoUsuario->id_rol = 2;
            $nuevoUsuario->crear();
            header('Location: ' . BASE_URL . 'registroOK');  
        }
    
    }
    function registroKO(){
        require_once 'vistas/usuarios/usuarioExistente.php';
    }
    function registroOK(){
        require_once 'vistas/usuarios/registroMensaje.php';
    }

    
}