<?php
require_once "../models/Conversation.php";

class AdminController {

    private $conversation;

    public function __construct($db) {
        $this->conversation = new Conversation($db);
    }

    public function getConversations() {

        $conversations = $this->conversation->getAll();

        echo json_encode($conversations);
    }
}
