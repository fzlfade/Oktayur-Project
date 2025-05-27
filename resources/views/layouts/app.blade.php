<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <div class="bg-white px-6 shadow-md p-5 flex justify-between items-center">
        <div class="flex gap-3">
            <div class="text-2xl font-bold">Oktayur</div>
            <div class="text-l font-bold text-gray-500 pt-1">Penjual</div>
        </div>
        <div class="flex items-center space-x-4">
            <i class="fas fa-bell text-xl text-gray-600"></i>
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
        <div class="flex-1 p- bg-white border-2 rounded-xl">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: '{{ session("success") }}',
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session("error") }}'
    });
</script>
@endif
</html>