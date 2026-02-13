<?php

    require_once __DIR__ . '/../config/config.php';

    class Database {
        private $conn;

        public function getConnection() {
            $this->conn = null;

            try {
                $this->conn = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                    DB_USER,
                    DB_PASS
                );

                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e) {
                http_response_code(500);
                echo json_encode(["error" => "Error conexión BD"]);
                exit;
            }

            return $this->conn;
        }
    }
