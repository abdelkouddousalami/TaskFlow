<?php
require_once 'connect.php';
session_start();
$stmt = $pdo->query('SELECT * FROM tasks');
$tasks = $stmt->fetchAll();

$stmt = $pdo->query('SELECT * FROM users WHERE role = "user"');
$users = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-3xl font-bold text-center">Admin Dashboard</h1>
    </header>

    <main class="container mx-auto p-6">
        <!-- Task List -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">All Tasks</h2>
            <div class="bg-white shadow-md rounded-lg p-4">
                <?php if (!empty($tasks)): ?>
                    <ul>
                        <?php foreach ($tasks as $task): ?>
                            <li class="mb-4 p-4 border-b last:border-none">
                                <h3 class="text-xl font-bold text-gray-700">
                                    <?= htmlspecialchars($task['title']); ?>
                                    <span class="text-sm text-blue-500">(<?= htmlspecialchars($task['status']); ?>)</span>
                                </h3>
                                <p class="text-gray-600"><?= htmlspecialchars($task['description']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-gray-600">No tasks available.</p>
                <?php endif; ?>
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-semibold mb-4">Create a New Task</h2>
            <form action="manage.php" method="POST" class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium">Task Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="mt-2 p-2 w-full border rounded-md focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter task title"
                        required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-medium">Task Description</label>
                    <textarea
                        name="description"
                        id="description"
                        class="mt-2 p-2 w-full border rounded-md focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter task description"
                        required></textarea>
                </div>

                <div class="mb-4">
                    <label for="assigned_to" class="block text-gray-700 font-medium">Assign To</label>
                    <select
                        name="assigned_to"
                        id="assigned_to"
                        class="mt-2 p-2 w-full border rounded-md focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">Select User</option>
                        <?php foreach ($users as $user): ?>
                            <option value="<?= htmlspecialchars($user['id']); ?>">
                                <?= htmlspecialchars($user['name']); ?>
                            </option>

                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-gray-700 font-medium">Task Type</label>
                    <select
                        name="type"
                        id="type"
                        class="mt-2 p-2 w-full border rounded-md focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="simple">Simple</option>
                        <option value="bug">Bug</option>
                        <option value="feature">Feature</option>
                    </select>
                </div>

                <button
                    type="submit"
                    class="w-full p-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                    Create Task
                </button>
            </form>
        </section>
    </main>
</body>

</html>