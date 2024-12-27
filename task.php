<?php

class Task {
    private $id;
    private $title;
    private $description;
    private $status;
    private $assignedTo;
    private $type;

    public function __construct($title, $description, $assignedTo, $type, $status = 'Pending') {
        $this->title = $title;
        $this->description = $description;
        $this->assignedTo = $assignedTo;
        $this->status = $status;
        $this->type = $type;
    }

    public function createTask($pdo) {
        $query = "INSERT INTO tasks (title, description, assigned_to, status, type) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$this->title, $this->description, $this->assignedTo, $this->status, $this->type]);
    }

    public function updateStatus($pdo, $status) {
        $this->status = $status;
        $query = "UPDATE tasks SET status = ? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$this->status, $this->id]);
    }

    public function assignTask($pdo, $userId) {
        $this->assignedTo = $userId;
        $query = "UPDATE tasks SET assigned_to = ? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$this->assignedTo, $this->id]);
    }

    public function getTitle() {
        return $this->title;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getAssignedTo() {
        return $this->assignedTo;
    }

    public function getType() {
        return $this->type;
    }
}
?>
