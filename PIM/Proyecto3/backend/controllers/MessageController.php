<?php
require_once "../models/Message.php";

class MessageController {

    private $messageModel;

    public function __construct($db) {
        $this->messageModel = new Message($db);
    }

    public function send() {

        $data = json_decode(file_get_contents("php://input"), true);

        $message = trim($data['message']);
        $conversation_id = $data['conversation_id'];

        if(empty($message)) {
            echo json_encode(["error" => "Mensaje vacío"]);
            return;
        }

        $flagSpam = trim(shell_exec("python3 ../../python-ia/spam_detector.py \"$message\""));
        $flagOffensive = trim(shell_exec("python3 ../../python-ia/language_filter.py \"$message\""));

        $this->messageModel->send(
            $conversation_id,
            $message,
            $flagSpam,
            $flagOffensive
        );

        echo json_encode(["success" => true]);
    }

    public function get() {

        $id = $_GET['id'];

        $messages = $this->messageModel->getByConversation($id);

        echo json_encode($messages);
    }
}
