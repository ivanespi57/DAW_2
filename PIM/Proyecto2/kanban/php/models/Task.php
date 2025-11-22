<?php
// Modelo Task (placeholder)
class Task {
    public $id;
    public $description;
    public $status;
    public $priority;
    public $created_at;
    public $updated_at;

    public function __construct($data = []) {
        foreach ($data as $k => $v) $this->$k = $v;
    }
}
