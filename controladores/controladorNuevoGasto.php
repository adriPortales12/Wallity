<?php
class ControladorNuevoGasto{

    public function __construct(){
        session_start();
    }

    function nuevoGasto(){
        require_once 'modelos/Gastos.php';
        require_once 'modelos/Usuario.php';
        $nuevoGasto = new Gastos();
        $usuario = unserialize($_SESSION['usuario']);
        // Obtiene los datos del formulario
        
        $nuevoGasto->titulo = $_POST['titulo'];
        $nuevoGasto->id_categoria = intval($_POST['categoria']);
        $nuevoGasto->cantidad = $_POST['cantidad'];
        $nuevoGasto->fecha = date('Y-m-d');
        $nuevoGasto->id_usuario = $usuario->id;

        $nuevoGasto->crear();

        header('Location: /VirtualWalletSpending/dashboard');
    }

}