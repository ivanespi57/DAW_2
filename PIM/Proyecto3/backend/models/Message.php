<?php

class Message {

    private $conn;
    private $table = "messages";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function send($conversation_id, $message, $spam, $offensive) {

        $query = "INSERT INTO $this->table
                  (conversation_id, message, flagged_spam, flagged_offensive)
                  VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $conversation_id,
            htmlspecialchars($message),
            $spam,
            $offensive
        ]);
    }

    public function getByConversation($conversation_id) {

        $query = "SELECT * FROM $this->table
                  WHERE conversation_id = ?
                  ORDER BY created_at ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$conversation_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
