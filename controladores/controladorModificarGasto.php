<?php
class controladorModificarGasto{
    function __construct(){
        require_once 'modelos/Gastos.php';
        require_once 'modelos/Categoria.php';
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
        
        header('Location: /VirtualWalletSpending/dashboard?filtro=' . $filtro);
    }
}