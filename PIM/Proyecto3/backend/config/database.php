<?php

class Database {

    private $host = "db";
    private $db_name = "chat_denuncias";
    private $username = "root";
    private $password = "root";

    public function connect() {

        try {
            $conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch(PDOException $e) {
            die("Error conexión BD");
        }
    }
}
