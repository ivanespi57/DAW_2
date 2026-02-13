<?php

require_once "../config/database.php";
require_once "../controllers/ConversationController.php";
require_once "../controllers/MessageController.php";
require_once "../controllers/AdminController.php";

header("Content-Type: application/json");

$db = (new Database())->connect();

$action = $_GET['action'] ?? '';

switch($action) {

    case "create_conversation":
        (new ConversationController($db))->create();
        break;

    case "login_conversation":
        (new ConversationController($db))->login();
        break;

    case "send_message":
        (new MessageController($db))->send();
        break;

    case "get_messages":
        (new MessageController($db))->get();
        break;

    case "admin_get_conversations":
        (new AdminController($db))->getConversations();
        break;

    default:
        echo json_encode(["error" => "Acción no válida"]);
}
