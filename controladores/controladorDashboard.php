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
        require_once 'modelos/Categoria.php';

        $gastos = new Gastos();
        $datos_gastos = $gastos->datosGastos($_SESSION['user']); //lista de gastos del usuario
        $datos_gastos_mes = $gastos->gastosMes($_SESSION['user']); //la misma lista de gastos pero del ultimo mes
        $gastosMes = $gastos->totalGasto($_SESSION['user']); //total dinero gastado en el mes
        $fecha_ultimo_mes = date('d-M-Y', strtotime('-1 month'));

        $categoria = new Categoria();
        $listaCategorias = $categoria->listaCategorias();

        require_once 'vistas/dashboard.php';
    }

    function abrirDashboardAdmin(){
        require_once 'vistas/dashboardAdmin.php';
    }
}