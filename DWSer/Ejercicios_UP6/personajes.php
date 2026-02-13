<?php
    require_once "database.php";

    class Personajes {

        private $conn;

        public function __construct() {
            $this->conn = Database::connect();
        }

        public function getAll() {
            $stmt = $this->conn->query("SELECT id,name,gender,height FROM characters");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id) {
            $stmt = $this->conn->prepare("SELECT id,name,gender,height FROM characters WHERE id=?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function create($data) {
            $stmt = $this->conn->prepare("INSERT INTO characters(name,gender,height) VALUES (?,?,?)");
            $stmt->execute([
                $data["name"],
                $data["gender"],
                $data["height"]
            ]);
            return $this->getById($this->conn->lastInsertId());
        }

        public function update($id,$data) {
            $stmt = $this->conn->prepare("UPDATE characters SET name=?, gender=?, height=? WHERE id=?");
            $stmt->execute([
                $data["name"],
                $data["gender"],
                $data["height"],
                $id
            ]);
            return $this->getById($id);
        }

        public function delete($id) {
            $stmt = $this->conn->prepare("DELETE FROM characters WHERE id=?");
            return $stmt->execute([$id]);
        }
    }
?>
