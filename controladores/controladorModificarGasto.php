<?php
class controladorModificarGasto{
    function __construct(){
        session_start();
        require_once 'modelos/Gastos.php';
        require_once 'modelos/Categoria.php';
        require_once 'modelos/Usuario.php';
    }

    function modificarGasto(){
        $gasto = new Gastos();
        $categoria = new Categoria();
        $idCategoria = $categoria->buscaId($_POST['categoria']);
        $filtro = $_POST['filtro'];

        $gasto->id = $_POST['id'];
        $gasto->titulo = $_POST['titulo'];
        $gasto->id_categoria = $idCategoria;
        $gasto->cantidad = $_POST['cantidad'];

        $gasto->actualizar();

        $usuario = unserialize($_SESSION['usuario']);
        
        header('Location: /VirtualWalletSpending/dashboard?filtro=' . $filtro . '&limite=' . $usuario->limite);
    }
}