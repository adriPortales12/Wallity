<?php
class ControladorDashboard{

    public function __construct(){
        session_start();
        if(!isset($_SESSION['usuario'])){
            header('Location: /VirtualWalletSpending/');
        }
    }

    function abrirDashboard(){
        require_once 'modelos/Gastos.php';

        $gastos = new Gastos();
        $datos_gastos = $gastos->datosGastos($_SESSION['user']);
        require_once 'vistas/dashboard.php';
    }
}