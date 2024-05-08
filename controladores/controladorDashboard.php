<?php
class ControladorDashboard{
    public function __construct(){
        session_start();
        if(!isset($_SESSION['usuario'])){
            header('Location: /VirtualWalletSpending/');
        }
    }

    function abrirDashboard(){
        require_once 'vistas/dashboard.php';
    }
}