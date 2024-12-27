<?php
require_once 'task.php';

class Feature extends Task {
    private $priority;

    public function __construct($title, $description, $assignedTo, $priority) {
        parent::__construct($title, $description, $assignedTo, 'feature');
        $this->priority = $priority;
    }

    public function getPriority() {
        return $this->priority;
    }
}
?>
