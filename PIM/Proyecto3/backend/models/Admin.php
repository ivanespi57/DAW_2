<?php

class Admin {

    private $conn;
    private $table = "admins";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $password) {

        $hash = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO $this->table (username, password_hash)
                  VALUES (?, ?)";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$username, $hash]);
    }

    public function login($username, $password) {

        $query = "SELECT * FROM $this->table WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if($admin && password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin_id'] = $admin['id'];
            return true;
        }

        return false;
    }
}
