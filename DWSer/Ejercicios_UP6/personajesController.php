<?php
    require_once "personajes.php";

    class PersonajesController {

        public function handleRequest() {

            header("Content-Type: application/json");

            $method = $_SERVER['REQUEST_METHOD'];

            $uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
            $resource = isset($uri[1]) ? $uri[1] : null;
            $id = isset($uri[2]) ? $uri[2] : null;

            if ($resource !== "personajes") {
                http_response_code(404);
                echo json_encode(["error"=>"Recurso no encontrado"]);
                exit;
            }

            $model = new Personajes();

            if ($method === "GET" && isset($uri[2]) && $uri[2] === "importarSWAPI") {

                $json = file_get_contents("https://swapi.dev/api/people/");
                $data = json_decode($json, true);

                foreach ($data["results"] as $personaje) {
                    $model->create([
                        "name"=>$personaje["name"],
                        "gender"=>$personaje["gender"],
                        "height"=>$personaje["height"]
                    ]);
                }

                http_response_code(200);
                echo json_encode(["message"=>"Personajes importados"]);
                exit;
            }

            if ($method === "GET" && !$id) {
                http_response_code(200);
                echo json_encode($model->getAll());
                exit;
            }

            if ($method === "GET" && $id) {
                $personaje = $model->getById($id);

                if ($personaje) {
                    http_response_code(200);
                    echo json_encode($personaje);
                    exit;
                }

                http_response_code(404);
                echo json_encode(["error"=>"No encontrado"]);
                exit;
            }

            if ($method === "POST") {

                $input = json_decode(file_get_contents("php://input"), true);
                $nuevo = $model->create($input);

                http_response_code(201);
                echo json_encode($nuevo);
                exit;
            }

            if ($method === "PUT" && $id) {

                $input = json_decode(file_get_contents("php://input"), true);
                $actualizado = $model->update($id,$input);

                http_response_code(200);
                echo json_encode($actualizado);
                exit;
            }

            if ($method === "DELETE" && $id) {

                $model->delete($id);
                http_response_code(204);
                exit;
            }

            http_response_code(400);
            echo json_encode(["error"=>"Petición incorrecta"]);
            exit;
        }
    }
?>
