<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <div class="bg-white shadow-md p-4 flex justify-between items-center">
        <div class="flex gap-2">
            <div class="text-2xl font-bold">Oktayur</div>
            <div class="text-l font-bold text-gray-500 pt-1">Penjual</div>
        </div>
        <div class="flex items-center space-x-4">
            <i class="fas fa-bell text-xl text-gray-600"></i>
            <div class="w-10 h-10 bg-blue-500 rounded-full"></div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white p-2 rounded">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <div class="flex h-screen gap-2">
        <!-- Sidebar -->
        <div class="w-1/5 bg-white shadow-md p-4 border-2 rounded-xl">
            @include('layouts.sidebar')
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-white border-2 rounded-xl">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>
</html>