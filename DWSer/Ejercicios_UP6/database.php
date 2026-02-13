<?php
    require_once "config.php";

    class Database {

        public static function connect() {
            try {
                $pdo = new PDO(
                    "mysql:host=" . HOST . ";dbname=" . DBNAME . ";charset=utf8mb4",
                    USERNAME,
                    PASSWORD
                );
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(["error" => "Error de conexión"]);
                exit;
            }
        }
    }
?>
