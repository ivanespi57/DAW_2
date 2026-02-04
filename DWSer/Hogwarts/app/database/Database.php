<?php

class Database {

    private $host = "";
    private $db   = "";
    private $usuario = "";
    private $contrasena = "";
    private $charset = "utf8mb4";

    public function conectar() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        return new PDO($dsn, $this->usuario, $this->contrasena, $opciones);
    }
}
