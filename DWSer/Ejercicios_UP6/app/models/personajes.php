<?php

    class Personajes {

        private $conn;
        private $table = "characters";

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAll() {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id) {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function create($data) {
            $stmt = $this->conn->prepare(
                "INSERT INTO $this->table (name, gender, height) VALUES (?, ?, ?)"
            );
            return $stmt->execute([
                $data['name'],
                $data['gender'],
                $data['height']
            ]);
        }

        public function update($id, $data) {
            $stmt = $this->conn->prepare(
                "UPDATE $this->table SET name=?, gender=?, height=? WHERE id=?"
            );
            return $stmt->execute([
                $data['name'],
                $data['gender'],
                $data['height'],
                $id
            ]);
        }

        public function delete($id) {
            $stmt = $this->conn->prepare(
                "DELETE FROM $this->table WHERE id=?"
            );
            return $stmt->execute([$id]);
        }

        public function importarSWAPI() {

            $url = "https://swapi.dev/api/people/";
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            foreach ($data['results'] as $personaje) {

                $stmt = $this->conn->prepare(
                    "INSERT INTO $this->table (name, gender, height) VALUES (?, ?, ?)"
                );

                $height = is_numeric($personaje['height']) ? $personaje['height'] : null;

                $stmt->execute([
                    $personaje['name'],
                    $personaje['gender'],
                    $height
                ]);
            }

            return true;
        }
    }
