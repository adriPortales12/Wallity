<?php
class Conexion
{
    private $servername;
    private $username;
    private $password;
    private $puerto;
    private $base;

    function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->puerto = 3307;
        $this->base = "virtualwalletspending";
    }

    function conectar()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;port=$this->puerto;dbname=$this->base;charset=utf8", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Error en la operación: " . $e->getMessage();
        }
    }

}