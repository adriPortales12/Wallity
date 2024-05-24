<?php
class ControladorNuevoGasto{

    public function __construct(){
        session_start();
    }

    function nuevoGasto(){
        require_once 'modelos/Gastos.php';
        require_once 'modelos/Usuario.php';
        require_once 'modelos/Categoria.php';
        $nuevoGasto = new Gastos();
        $usuario = unserialize($_SESSION['usuario']);
        $categoria = new Categoria();
        $idCat = $categoria->buscaId($_POST['categoria']);
        // Obtiene los datos del formulario
        
        $nuevoGasto->titulo = $_POST['titulo'];
        $nuevoGasto->id_categoria = $idCat;
        $nuevoGasto->cantidad = $_POST['cantidad'];
        $nuevoGasto->fecha = date('Y-m-d');
        $nuevoGasto->id_usuario = $usuario->id;

        $nuevoGasto->crear();

        $limite = $_POST['filtro'];

        header('Location: ' . BASE_URL . $_SESSION['ultimoDashboard'] . '?filtro=' . $limite . '&limite=' . $usuario->limite);
    }

}