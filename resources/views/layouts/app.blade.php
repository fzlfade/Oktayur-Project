<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
        }
        
        .sidebar {
            transition: all 0.3s ease;
        }
        
        .main-content {
            transition: all 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                margin-bottom: 1rem;
            }
            .main-content {
                width: 100%;
            }
        }
        
        .nav-link {
            transition: all 0.2s ease;
            position: relative;
        }
        
        .nav-link.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -1px;
            width: 100%;
            height: 3px;
            background-color: #10B981;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="bg-white shadow-lg py-4 px-6 flex flex-col md:flex-row justify-between items-center sticky top-0 z-50">
        <div class="flex items-center gap-3 mb-4 md:mb-0">
            <a href="/">
                <div class="text-2xl font-bold text-green-600 flex items-center">
                    <i class="fas fa-leaf mr-2"></i> Oktayur
                </div>
            </a>
            <div class="text-sm font-bold text-gray-500">Penjual</div>
        </div>
        
        <div class="flex items-center space-x-6">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-green-200 flex items-center justify-center text-green-800 font-bold mr-3">
                    @if(Auth::user()->profile_photo_path)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Foto Profil" class="w-full h-full rounded-full object-cover">
                    @else
                        <i class="fas fa-user text-2xl"></i>
                    @endif
                </div>
                <span class="hidden md:block text-gray-700">{{ Auth::user()->name }}</span>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300 flex items-center">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <div class="flex flex-col md:flex-row min-h-screen gap-4 p-4">
        <div class="sidebar w-full md:w-64 bg-white shadow-lg rounded-xl p-4">
            @include('layouts.sidebar')
        </div>

        <div class="main-content flex-1 bg-white shadow-lg rounded-xl p-6 overflow-y-auto">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>
</html>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: '{{ session("success") }}',
        timer: 3000,
        showConfirmButton: false,
        position: 'top-end',
        toast: true,
        background: '#10B981',
        color: '#fff',
        iconColor: '#fff'
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session("error") }}',
        position: 'top-end',
        toast: true,
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif