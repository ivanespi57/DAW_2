<?php
require_once "../models/Conversation.php";

class ConversationController {

    private $conversation;

    public function __construct($db) {
        $this->conversation = new Conversation($db);
    }

    public function create() {

        $data = json_decode(file_get_contents("php://input"), true);

        if(empty($data['password'])) {
            echo json_encode(["error" => "Contraseña requerida"]);
            return;
        }

        $code = $this->conversation->create($data['password']);

        echo json_encode(["code" => $code]);
    }

    public function login() {

        $data = json_decode(file_get_contents("php://input"), true);

        $result = $this->conversation->verify($data['code'], $data['password']);

        if($result){
            echo json_encode([
                "success" => true,
                "id" => $result['id']
            ]);
        } else {
            echo json_encode(["success" => false]);
        }
    }
}
