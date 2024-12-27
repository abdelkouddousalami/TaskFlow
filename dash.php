<?php
require_once 'connect.php';

$userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;

if (!$userId) {
    echo "No User ID provided.";
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$userId]);
$user = $stmt->fetch();

if (!$user) {
    echo "User not found.";
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM tasks WHERE assigned_to = ?');
$stmt->execute([$userId]);
$tasks = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($user['name']); ?></h1>
    <h2>Your Tasks</h2>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong><?= htmlspecialchars($task['title']); ?></strong> - <?= htmlspecialchars($task['status']); ?>
                <p><?= htmlspecialchars($task['description']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
