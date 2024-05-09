<?php
require_once "base/Crud.php";


class Usuario extends Crud{

    private const TABLA = "usuarios";
    private $id;
    private $nombre_usuario;
    private $contrasena;
    private $nombre;
    private $id_rol;


    function __construct()
    {
        parent::__construct(Usuario::TABLA);
    }

    public function __set($param, $valor)
    {
        $this->$param = $valor;
    }

    public function __get($param)
    {
        return $this->$param;
    }

    public function crear() {
        try {
            $connection = $this->conectar();

            $sql = "INSERT INTO usuarios (nombre_usuario, contrasena, nombre, id_rol)
                    VALUES (:nombre_usuario, :contrasena, :nombre, :id_rol)";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':nombre_usuario', $this->nombre_usuario);
            $stmt->bindParam(':contrasena', $this->contrasena);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':id_rol', $this->id_rol);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "PDO Error: " . $e->getMessage();
        }
    }
    public function borrar()
    {
        $connection = $this->conectar();

        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }
    public function actualizar()
    {
    $connection = $this->conectar();

    $sql = "UPDATE usuarios SET nombre_usuario = :nombre_usuario, contrasena = :contrasena, nombre = :nombre, id_rol = :id_rol
         WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':nombre_usuario', $this->nombre_usuario);
    $stmt->bindParam(':contrasena', $this->contrasena);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':id_rol', $this->id_rol);

    $stmt->execute();
    }
    public function verificaUsuario($usuario, $contrasena)
    {
        $connection = $this->conectar();

        $sql = "SELECT COUNT(*) AS count FROM usuarios WHERE nombre_usuario = :usuario";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'];

        // Verifica si se encontró exactamente un usuario con el nombre dado
        if ($count === 1) {
            // Consulta para obtener la contrasena almacenada para el usuario dado
            $sql = "SELECT contrasena FROM usuarios WHERE nombre_usuario = :usuario";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $contrasenaHash = $result['contrasena'];

            // Verifica si la contrasena dada coincide con la contrasena almacenada
            if (password_verify($contrasena, $contrasenaHash)) {
                return true; // Contrasena válida
            } else {
                return false; // Contrasena incorrecta
            }
        } else {
            return false; // Usuario no encontrado o múltiples usuarios encontrados
        }
        }

        function bucarUsuario($nombreUsuario){
            $connection = $this->conectar();
            $sql = "SELECT COUNT(*) AS count FROM usuarios WHERE nombre_usuario = :usuario";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':usuario', $nombreUsuario);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $result['count'];

            if($count === 1){
                return true;
            }
            return false;
        }
        public function __toString() {
            return "Usuario: [id={$this->id}, contrasena={$this->contrasena}, nombre_usuario={$this->nombre_usuario}, nombre={$this->nombre}, id_rol={$this->id_rol}]";
        }
}