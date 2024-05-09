<?php

require_once "base/Crud.php";

class Rol extends Crud
{
    private const TABLA = "roles";
    private $id;
    private $rol;

    public function __construct()
    {
        parent::__construct(Rol::TABLA);
    }

    public function __set($param, $valor)
    {
        $this->$param = $valor;
    }

    public function __get($param)
    {
        return $this->$param;
    }

    public function crear()
    {
        $connection = $this->conectar();

        $sql = "INSERT INTO roles (rol) VALUES (:rol)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':rol', $this->rol);
        $stmt->execute();
    }

    public function borrar()
    {
        $connection = $this->conectar();

        $sql = "DELETE FROM roles WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }

    public function actualizar()
    {
        $connection = $this->conectar();

        $sql = "UPDATE roles SET rol = :rol WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':rol', $this->rol);
        $stmt->execute();
    }
}