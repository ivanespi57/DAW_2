<?php
    require_once __DIR__ . '/../database/database.php';
    require_once __DIR__ . '/../models/personajes.php';

    class PersonajesController {

        private $model;

        public function __construct() {
            $database = new Database();
            $db = $database->getConnection();
            $this->model = new Personajes($db);
        }

        public function handleRequest() {

            header("Content-Type: application/json");

            $method = $_SERVER['REQUEST_METHOD'];
            $uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

            $key = array_search("personajes", $uri);

            if ($key === false) {
                http_response_code(404);
                echo json_encode(["error" => "Endpoint no válido"]);
                exit;
            }

            $action = $uri[$key + 1] ?? null;

            if ($method === "GET" && $action === "importarSWAPI") {

                $this->model->importarSWAPI();
                http_response_code(200);
                echo json_encode(["message" => "Personajes importados"]);
                exit;
            }

            if ($method === "GET" && !$action) {
                echo json_encode($this->model->getAll());
                exit;
            }

            if ($method === "GET" && is_numeric($action)) {
                $result = $this->model->getById($action);

                if ($result) {
                    echo json_encode($result);
                } else {
                    http_response_code(404);
                    echo json_encode(["error" => "No encontrado"]);
                }
                exit;
            }

            if ($method === "POST") {
                $data = json_decode(file_get_contents("php://input"), true);

                $this->model->create($data);

                http_response_code(201);
                echo json_encode(["message" => "Creado"]);
                exit;
            }

            if ($method === "PUT" && is_numeric($action)) {
                $data = json_decode(file_get_contents("php://input"), true);

                $this->model->update($action, $data);

                echo json_encode(["message" => "Actualizado"]);
                exit;
            }

            if ($method === "DELETE" && is_numeric($action)) {

                $this->model->delete($action);

                echo json_encode(["message" => "Eliminado"]);
                exit;
            }

            http_response_code(400);
            echo json_encode(["error" => "Petición inválida"]);
            exit;
        }
    }
