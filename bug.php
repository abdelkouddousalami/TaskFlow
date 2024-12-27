<?php
require_once 'task.php';

class Bug extends Task {
    private $severity;

    public function __construct($title, $description, $assignedTo, $severity) {
        parent::__construct($title, $description, $assignedTo, 'bug');
        $this->severity = $severity;
    }

    public function getSeverity() {
        return $this->severity;
    }
}
?>
