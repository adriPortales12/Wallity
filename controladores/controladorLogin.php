<?php
class ControladorLogin{
    public function __construct(){
    }

    public function login(){
        require_once "vistas/login.php";
    }

    public function verificarLogin(){
        require_once "modelos/Usuario.php";
        $usuarioLogin = new Usuario();

        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        if($usuarioLogin->verificaUsuario($usuario,$contraseña)){
            header('Location: /VirtualWalletSpending/dashboard');
        }else{
            header('Location: /VirtualWalletSpending/?err=1');
        }
        

    }

}