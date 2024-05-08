<?php
require_once "Conexion.php";
abstract class Crud extends Conexion
{
    private $tabla;

    function __construct($tabla)
    {
        $this->tabla = $tabla;
        parent::__construct();
    }

    abstract function crear();
    abstract function borrar();
    abstract function actualizar();
}