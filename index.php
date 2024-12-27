<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Flow</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function switchForm(type) {
            const userForm = document.getElementById('user-form');
            const adminForm = document.getElementById('admin-form');
            if (type === 'user') {
                userForm.classList.remove('hidden');
                adminForm.classList.add('hidden');
            } else {
                adminForm.classList.remove('hidden');
                userForm.classList.add('hidden');
            }
        }
    </script>
</head>
<body class="bg-gradient-to-r from-blue-400 to-green-400 min-h-screen flex flex-col items-center">
    <nav class="bg-white shadow-md py-4 w-full">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="#" class="text-2xl font-bold text-blue-600">Task Flow</a>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-10 flex justify-center items-center w-4/5">
        <div class="flex bg-white shadow-lg rounded-lg overflow-hidden w-full">
            <div class="w-1/3 p-6 bg-gradient-to-b from-blue-500 to-blue-600 text-white flex flex-col justify-center">
                <h1 class="text-3xl font-bold mb-6 text-center">Welcome to Task Flow</h1>
                <p class="mb-4 text-center">Choose your role to proceed:</p>
                <button 
                    class="w-full mb-4 px-4 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition" 
                    onclick="switchForm('user')">User</button>
                <button 
                    class="w-full px-4 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition" 
                    onclick="switchForm('admin')">Admin</button>
            </div>

            <div class="w-2/3 p-6 bg-gray-100 flex items-center justify-center">
                <div id="user-form" class="hidden w-full max-w-md">
                    <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">User Sign In</h2>
                    <form action="dash.php" method="GET">
                        <label class="block text-gray-600 mb-2">User ID</label>
                        <input type="number" name="user_id" class="w-full mb-4 p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your ID" required>
                        <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition">Proceed</button>
                    </form>
                </div>

                <div id="admin-form" class="hidden w-full max-w-md">
                    <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Admin Sign In</h2>
                    <form action="crud.php" method="GET">
                        <button type="submit" class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
