<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Oktayur</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <script src="{{ asset('js/JsProduk.js') }}" defer></script>
</head>
<body class="bg-gray-100">
  <header class="p-4 bg-white shadow">
    <div class="container mx-auto">
      <a href="{{ route('home') }}" class="text-2xl font-bold">Oktayur</a>
    </div>
  </header>
  <main class="container mx-auto py-6">
    @yield('content')
  </main>
  <footer class="p-4 text-center text-sm text-gray-600">
    &copy; 2025 Oktayur
  </footer>
</body>
</html>
