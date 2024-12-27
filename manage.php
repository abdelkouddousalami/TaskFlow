
<?php
require_once 'connect.php';
require_once 'task.php';
require_once 'bug.php';
require_once 'fetea.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['assigned_to']) && !empty($_POST['type'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $assignedTo = $_POST['assigned_to'];
        $type = $_POST['type'];
        $status = 'Pending';

        if ($type == 'bug') {
            $severity = $_POST['severity'];
            $task = new Bug($title, $description, $assignedTo, $severity);
        } elseif ($type == 'feature') {
            $priority = $_POST['priority'];
            $task = new Feature($title, $description, $assignedTo, $priority);
        }

        $task->createTask($pdo);
        echo "Task created successfully!";
    } else {
        echo "Please fill in all the fields.";
    }
}
?>
