<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="user_id" content="{{ Auth::user()?->id }}">
    <title>Messages</title>
    @vite('resources/js/echo.js')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <header class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold">Messages</h1>
        </div>
    </header>
    <main class="container mx-auto mt-6">
        <div id="messages" class="bg-white p-4 rounded shadow-md"></div>
    </main>
    <footer class="bg-gray-800 text-white text-center p-4 mt-6">
        <p>&copy; {{ date('Y') }} Cursus App. All rights reserved.</p>
    </footer>
</body>
</html>
