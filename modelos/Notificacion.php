<?php
require_once "base/Crud.php";

class Notificacion extends Crud
{
    private const TABLA = "notificaciones";
    private $id_usuario;
    private $limite_comida;
    private $limite_hogar;
    private $limite_ropa;
    private $limite_juegos;
    private $limite_viajes;
    private $limite_otros;

    function __construct()
    {
        parent::__construct(Notificacion::TABLA);
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

        $sql = "INSERT INTO notificaciones (id_usuario, limite_comida, limite_hogar, limite_ropa, limite_juegos, limite_viajes, limite_otros) VALUES (:id_usuario, :limite_comida, :limite_hogar, :limite_ropa, :limite_juegos, :limite_viajes, :limite_otros)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id_usuario', $this->id_usuario);
        $stmt->bindParam(':limite_comida', $this->limite_comida);
        $stmt->bindParam(':limite_hogar', $this->limite_hogar);
        $stmt->bindParam(':limite_ropa', $this->limite_ropa);
        $stmt->bindParam(':limite_juegos', $this->limite_juegos);
        $stmt->bindParam(':limite_viajes', $this->limite_viajes);
        $stmt->bindParam(':limite_otros', $this->limite_otros);
        $stmt->execute();
    }

    public function borrar()
    {
        $connection = $this->conectar();

        $sql = "DELETE FROM notificaciones WHERE id_usuario = :id_usuario";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id_usuario', $this->id_usuario);
        $stmt->execute();
    }

    public function actualizar()
    {
        $connection = $this->conectar();

        $sql = "UPDATE notificaciones SET limite_comida = :limite_comida, limite_hogar = :limite_hogar, limite_ropa = :limite_ropa, limite_juegos = :limite_juegos, limite_viajes = :limite_viajes, limite_otros = :limite_otros WHERE id_usuario = :id_usuario";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id_usuario', $this->id_usuario);
        $stmt->bindParam(':limite_comida', $this->limite_comida);
        $stmt->bindParam(':limite_hogar', $this->limite_hogar);
        $stmt->bindParam(':limite_ropa', $this->limite_ropa);
        $stmt->bindParam(':limite_juegos', $this->limite_juegos);
        $stmt->bindParam(':limite_viajes', $this->limite_viajes);
        $stmt->bindParam(':limite_otros', $this->limite_otros);
        $stmt->execute();
    }
    public function actualizarUnLimite($limite)
{
    $connection = $this->conectar();

    // Verificar qué límite se está actualizando y construir la consulta SQL correspondiente
    $sql = "";
    switch ($limite) {
        case 'comida':
            $sql = "UPDATE notificaciones SET limite_comida = :limite_comida WHERE id_usuario = :id_usuario";
            break;
        case 'hogar':
            $sql = "UPDATE notificaciones SET limite_hogar = :limite_hogar WHERE id_usuario = :id_usuario";
            break;
        case 'ropa':
            $sql = "UPDATE notificaciones SET limite_ropa = :limite_ropa WHERE id_usuario = :id_usuario";
            break;
        case 'juegos':
            $sql = "UPDATE notificaciones SET limite_juegos = :limite_juegos WHERE id_usuario = :id_usuario";
            break;
        case 'viajes':
            $sql = "UPDATE notificaciones SET limite_viajes = :limite_viajes WHERE id_usuario = :id_usuario";
            break;
        case 'otros':
            $sql = "UPDATE notificaciones SET limite_otros = :limite_otros WHERE id_usuario = :id_usuario";
            break;
        default:
            // Si se proporciona un límite no válido, no hacer nada
            return;
    }

    // Preparar la consulta SQL
    $stmt = $connection->prepare($sql);

    // Asignar los valores correspondientes al límite específico
    switch ($limite) {
        case 'comida':
            $stmt->bindParam(':limite_comida', $this->limite_comida);
            break;
        case 'hogar':
            $stmt->bindParam(':limite_hogar', $this->limite_hogar);
            break;
        case 'ropa':
            $stmt->bindParam(':limite_ropa', $this->limite_ropa);
            break;
        case 'juegos':
            $stmt->bindParam(':limite_juegos', $this->limite_juegos);
            break;
        case 'viajes':
            $stmt->bindParam(':limite_viajes', $this->limite_viajes);
            break;
        case 'otros':
            $stmt->bindParam(':limite_otros', $this->limite_otros);
            break;
    }

    // Asignar el valor del ID de usuario
    $stmt->bindParam(':id_usuario', $this->id_usuario);

    // Ejecutar la consulta
    $stmt->execute();
}

    public function datosNotificaciones(){
        $connection = $this->conectar();
        $sql = "SELECT * FROM notificaciones WHERE id_usuario = :id_usuario";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id_usuario', $this->id_usuario);
        $stmt->execute();

        $notificaciones = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $notificacion = new Notificacion();
            $notificacion->id_usuario = $row['id_usuario'];
            $notificacion->limite_comida = $row['limite_comida'];
            $notificacion->limite_hogar = $row['limite_hogar'];
            $notificacion->limite_ropa = $row['limite_ropa'];
            $notificacion->limite_juegos = $row['limite_juegos'];
            $notificacion->limite_viajes = $row['limite_viajes'];
            $notificacion->limite_otros = $row['limite_otros'];
            $notificaciones[] = $notificacion;
        }

        return $notificaciones;
    }
}
