<?php

class controladorBorrarGasto{
    public function __construct(){
        require_once 'modelos/Gastos.php';
    }

    function borrarGasto(){
        $gasto = new Gastos();
        $filtro = $_POST['filtro'];
        $gasto->id = $_POST['id'];
        $gasto->borrar();
        header('Location: /VirtualWalletSpending/dashboard?filtro=' . $filtro);
    }
}


