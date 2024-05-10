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
        $gastosMes = $gastos->totalGasto($_SESSION['user']);
        $fecha_ultimo_mes = date('d-M-Y', strtotime('-1 month'));
        require_once 'vistas/dashboard.php';
    }

    function abrirDashboardAdmin(){
        require_once 'vistas/dashboardAdmin.php';
    }
}