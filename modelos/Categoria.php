<?php
require_once "base/Crud.php";

class Categoria extends Crud {
    private const TABLA = "categorias";
    private $id;
    private $nombre;

    function __construct() {
        parent::__construct(Categoria::TABLA);
    }

    public function __set($param, $valor) {
        $this->$param = $valor;
    }

    public function __get($param) {
        return $this->$param;
    }

    public function crear() {
        $connection = $this->conectar();

        $sql = "INSERT INTO categorias (nombre) VALUES (:nombre)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre', $this->nombre);

        $stmt->execute();
    }

    public function borrar() {
        $connection = $this->conectar();

        $sql = "DELETE FROM categorias WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $this->id);

        $stmt->execute();
    }

    public function actualizar() {
        $connection = $this->conectar();

        $sql = "UPDATE categorias SET nombre = :nombre WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nombre', $this->nombre);

        $stmt->execute();
    }
}
