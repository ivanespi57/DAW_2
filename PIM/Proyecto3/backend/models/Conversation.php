<?php

class Conversation {

    private $conn;
    private $table = "conversations";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($password) {

        $code = time() . rand(100,999);
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO $this->table (code, password_hash)
                  VALUES (?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$code, $hash]);

        return $code;
    }

    public function verify($code, $password) {

        $query = "SELECT * FROM $this->table WHERE code = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$code]);

        $conversation = $stmt->fetch(PDO::FETCH_ASSOC);

        if($conversation && password_verify($password, $conversation['password_hash'])) {
            return $conversation;
        }

        return false;
    }

    public function getAll() {

        $query = "SELECT * FROM $this->table ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
