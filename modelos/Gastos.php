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

        $sql = "SELECT g.*, c.nombre AS nombre_categoria, DATE_FORMAT(g.fecha, '%d-%m-%Y') AS fecha_formateada 
        FROM gastos g 
        INNER JOIN usuarios u ON g.id_usuario = u.id 
        INNER JOIN categorias c ON g.id_categoria = c.id
        WHERE u.nombre_usuario = :nombre_usuario
        ORDER BY g.fecha DESC";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function gastosDia($nombre_usuario){
        $connection = $this->conectar();
    
        $fecha_hace_1_dia = date('Y-m-d', strtotime('-1 day'));
    
        $sql = "SELECT g.*, c.nombre AS nombre_categoria, DATE_FORMAT(g.fecha, '%d-%m-%Y') AS fecha_formateada 
                FROM gastos g 
                INNER JOIN usuarios u ON g.id_usuario = u.id 
                INNER JOIN categorias c ON g.id_categoria = c.id
                WHERE u.nombre_usuario = :nombre_usuario
                AND g.fecha >= :fecha_limite
                ORDER BY g.fecha DESC";
    
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':fecha_limite', $fecha_hace_1_dia); 
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function gastosMes($nombre_usuario){
        $connection = $this->conectar();
    
        $fecha_hace_30_dias = date('Y-m-d', strtotime('-1 month'));
    
        $sql = "SELECT g.*, c.nombre AS nombre_categoria, DATE_FORMAT(g.fecha, '%d-%m-%Y') AS fecha_formateada 
                FROM gastos g 
                INNER JOIN usuarios u ON g.id_usuario = u.id 
                INNER JOIN categorias c ON g.id_categoria = c.id
                WHERE u.nombre_usuario = :nombre_usuario
                AND g.fecha >= :fecha_limite
                ORDER BY g.fecha DESC";
    
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':fecha_limite', $fecha_hace_30_dias); 
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function gastosAnio($nombre_usuario){
        $connection = $this->conectar();
    
        $fecha_hace_1_anio = date('Y-m-d', strtotime('-1 year'));
    
        $sql = "SELECT g.*, c.nombre AS nombre_categoria, DATE_FORMAT(g.fecha, '%d-%m-%Y') AS fecha_formateada 
                FROM gastos g 
                INNER JOIN usuarios u ON g.id_usuario = u.id 
                INNER JOIN categorias c ON g.id_categoria = c.id
                WHERE u.nombre_usuario = :nombre_usuario
                AND g.fecha >= :fecha_limite
                ORDER BY g.fecha DESC";
    
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':fecha_limite', $fecha_hace_1_anio); 
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function totalGastoDia($nombre_usuario){
        $connection = $this->conectar();
    
        // Obtener la fecha de hace 30 días
        $fecha_hace_1_dia = date('Y-m-d', strtotime('-1 day'));
    
        // Consulta SQL para obtener la suma de los gastos en los últimos 30 días
        $sql = "SELECT SUM(g.cantidad) AS total_gastos 
        FROM gastos g 
        INNER JOIN usuarios u ON g.id_usuario = u.id 
        WHERE u.nombre_usuario = :nombre_usuario 
        AND g.fecha >= :fecha_limite";
    
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':fecha_limite', $fecha_hace_1_dia);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function totalGastoMes($nombre_usuario){
        $connection = $this->conectar();
    
        // Obtener la fecha de hace 30 días
        $fecha_hace_30_dias = date('Y-m-d', strtotime('-30 days'));
    
        // Consulta SQL para obtener la suma de los gastos en los últimos 30 días
        $sql = "SELECT SUM(g.cantidad) AS total_gastos 
        FROM gastos g 
        INNER JOIN usuarios u ON g.id_usuario = u.id 
        WHERE u.nombre_usuario = :nombre_usuario 
        AND g.fecha >= :fecha_limite";
    
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':fecha_limite', $fecha_hace_30_dias);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function totalGastoAnio($nombre_usuario){
        $connection = $this->conectar();
    
        // Obtener la fecha de hace 30 días
        $fecha_hace_1_anio = date('Y-m-d', strtotime('-1 year'));
    
        // Consulta SQL para obtener la suma de los gastos en los últimos 30 días
        $sql = "SELECT SUM(g.cantidad) AS total_gastos 
        FROM gastos g 
        INNER JOIN usuarios u ON g.id_usuario = u.id 
        WHERE u.nombre_usuario = :nombre_usuario 
        AND g.fecha >= :fecha_limite";
    
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':fecha_limite', $fecha_hace_1_anio);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __toString() {
        return "ID: " . $this->id . "\n" .
               "Título: " . $this->titulo . "\n" .
               "ID Categoría: " . $this->id_categoria . "\n" .
               "Cantidad: " . $this->cantidad . "\n" .
               "Fecha: " . $this->fecha . "\n" .
               "ID Usuario: " . $this->id_usuario . "\n";
    }
}
