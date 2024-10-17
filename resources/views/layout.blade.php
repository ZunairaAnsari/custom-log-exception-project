<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-peach-100 { background-color: #ffe4e1; }
        .bg-peach-200 { background-color: #ffcccb; }
        .bg-peach-300 { background-color: #ffb3b3; }
        .bg-peach-400 { background-color: #ff9999; }
        .bg-peach-500 { background-color: #ff7f7f; }
        .bg-peach-600 { background-color: #ff6666; }
        .bg-mint-100 { background-color: #f0fff0; }
        .bg-mint-200 { background-color: #d9ffcc; }
        .bg-mint-300 { background-color: #b3ffb3; }
        .bg-mint-400 { background-color: #99ff99; }
        .bg-mint-500 { background-color: #7fff7f; }
        .bg-mint-600 { background-color: #66ff66; }
        
        .text-peach-500 { color: #ff6f61; }
        .text-peach-600 { color: #ff4d4d; }
    </style>
</head>
<body class="bg-gradient-to-r from-sky-100 via-lavender-100 to-peach-100 font-sans">

    <!-- Header Section -->
    <header class="bg-gradient-to-r from-peach-200 via-lavender-300 to-sky-200 text-gray-800 py-6 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-4xl font-bold text-gray-900">Mobitising</h1>
            <nav>
                <ul class="flex space-x-6">
                    @if (Auth::check())
                        <li><a href="{{ url('/') }}" class="hover:text-peach-500">Home</a></li>
                        <li><a href="{{ route('posts.index') }}" class="hover:text-peach-500">Posts</a></li>
                        <li><a href="{{ route('logout') }}" class="hover:text-peach-500">Logout</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-peach-500">Login</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-peach-500">Register</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <!-- Body Section -->
    <main class="container mx-auto py-10">
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer class="bg-gradient-to-r from-peach-200 via-lavender-300 to-sky-200 text-gray-800 py-4 text-center">
        <p>&copy; 2024 Your Website. All rights reserved.</p>
    </footer>

</body>
</html>
