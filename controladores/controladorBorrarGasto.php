<?php

class controladorBorrarGasto{
    public function __construct(){
        session_start();
        require_once 'modelos/Usuario.php';
        require_once 'modelos/Gastos.php';
    }

    function borrarGasto(){
        $gasto = new Gastos();
        $filtro = $_POST['filtro'];
        $gasto->id = $_POST['id'];
        $gasto->borrar();

        $usuario = unserialize($_SESSION['usuario']);
        header('Location: /VirtualWalletSpending/dashboard?filtro=' . $filtro . '&limite=' . $usuario->limite);

    }
}


