<?php
require_once 'connect.php';

$userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;

if (!$userId) {
    echo "No User ID provided.";
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM tasks WHERE assigned_to = ?');
$stmt->execute([$userId]);
$tasks = $stmt->fetchAll();

$userStmt = $pdo->prepare('SELECT name FROM users WHERE id = ?');
$userStmt->execute([$userId]);
$user = $userStmt->fetch();

$userName = $user ? $user['name'] : "Unknown User"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold text-center mb-4">Welcome, <?= htmlspecialchars($userName); ?>!</h1>
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Your Tasks</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (count($tasks) > 0): ?>
                <?php foreach ($tasks as $task): ?>
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h3 class="text-xl font-bold text-gray-800"><?= htmlspecialchars($task['title']); ?></h3>
                        <p class="text-sm text-gray-500 mt-2"><?= htmlspecialchars($task['description']); ?></p>
                        <span class="block mt-4 px-3 py-1 rounded-full text-sm text-white 
                            <?= $task['status'] === 'completed' ? 'bg-green-500' : 'bg-yellow-500'; ?>">
                            <?= ucfirst(htmlspecialchars($task['status'])); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-gray-600">You have no tasks assigned.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
