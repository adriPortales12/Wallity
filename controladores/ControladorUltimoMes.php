<?php
class ControladorUltimoMes{

    function __construct(){
        session_start();
        require_once 'modelos/Gastos.php';
        require_once 'modelos/Usuario.php';
    }

    function verComparacion(){
        $usuario = unserialize($_SESSION['usuario']);
        $gastos = new Gastos();

        $gastosMesPasado = $gastos->gastosMesPasado($usuario->nombre_usuario);

        require_once 'vistas/comparacionMes.php';
    }
}