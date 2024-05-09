<?php
require_once "base/Crud.php";

class Gastos extends Crud {
    private const TABLA = "gastos";
    private $id;
    private $titulo;
    private $id_categoria;
    private $cantidad;
    private $fecha;
    private $id_usuario;

    function __construct() {
        parent::__construct(Gastos::TABLA);
    }

    public function __set($param, $valor) {
        $this->$param = $valor;
    }

    public function __get($param) {
        return $this->$param;
    }

    public function crear() {
        $connection = $this->conectar();

        $sql = "INSERT INTO gastos (titulo, id_categoria, cantidad, fecha, id_usuario)
                VALUES (:titulo, :id_categoria, :cantidad, :fecha, :id_usuario)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':id_categoria', $this->id_categoria);
        $stmt->bindParam(':cantidad', $this->cantidad);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':id_usuario', $this->id_usuario);

        $stmt->execute();
    }

    public function borrar() {
        $connection = $this->conectar();

        $sql = "DELETE FROM gastos WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }

    public function actualizar() {
        $connection = $this->conectar();

        $sql = "UPDATE gastos SET titulo = :titulo, id_categoria = :id_categoria,
                cantidad = :cantidad, fecha = :fecha, id_usuario = :id_usuario
                WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':id_categoria', $this->id_categoria);
        $stmt->bindParam(':cantidad', $this->cantidad);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':id_usuario', $this->id_usuario);

        $stmt->execute();
    }

    function datosGastos($nombre_usuario){
        $connection = $this->conectar();

        $sql = "SELECT g.* FROM gastos g INNER JOIN usuarios u ON g.id_usuario = u.id WHERE u.nombre_usuario = :nombre_usuario";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
