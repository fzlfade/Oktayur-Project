<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Oktayur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
        
        .auth-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }
        
        .input-field {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        }
        
        .btn-primary {
            background: linear-gradient(to right, #10B981, #059669);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .divider:not(:empty)::before {
            margin-right: 1em;
        }
        
        .divider:not(:empty)::after {
            margin-left: 1em;
        }
        
        .social-btn {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">
    <div class="auth-container p-8 max-w-md w-full">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-500 text-white mb-4">
                <i class="fas fa-leaf text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-white">Masuk ke Oktayur</h1>
            <p class="text-gray-300 mt-2">Selamat datang kembali! Silakan masuk ke akun Anda</p>
        </div>
        
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-500/20 text-red-100 rounded-lg text-sm">
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                        <li class="flex items-start">
                            <i class="fas fa-exclamation-circle mt-1 mr-2"></i>
                            <span>{{ $error }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            
            <div class="mb-5">
                <label class="block text-gray-300 mb-2">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="Email Anda" 
                        class="w-full pl-10 pr-4 py-3 input-field rounded-full text-white placeholder-gray-400 focus:outline-none"
                        value="{{ old('email') }}"
                    >
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-300 mb-2">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Password Anda" 
                        class="w-full pl-10 pr-4 py-3 input-field rounded-full text-white placeholder-gray-400 focus:outline-none"
                    >
                </div>
                <div class="mt-2 text-right">
                    <a href="#" class="text-green-300 hover:text-green-200 text-sm">Lupa password?</a>
                </div>
            </div>
            
            <div class="mb-6 flex items-center">
                <input 
                    type="checkbox" 
                    id="remember"
                    class="h-4 w-4 text-green-500 focus:ring-green-400 border-gray-300 rounded"
                >
                <label for="remember" class="ml-2 block text-sm text-gray-300">
                    Ingat saya
                </label>
            </div>
            
            <button type="submit" class="w-full py-3 btn-primary rounded-full text-white font-bold mb-6">
                Masuk
            </button>
            
            <div class="divider text-sm mb-6">atau lanjutkan dengan</div>
            
            <div class="grid grid-cols-2 gap-3 mb-6">
                <button type="button" class="py-2.5 social-btn rounded-full text-white">
                    <i class="fab fa-google mr-2"></i> Google
                </button>
                <button type="button" class="py-2.5 social-btn rounded-full text-white">
                    <i class="fab fa-facebook-f mr-2"></i> Facebook
                </button>
            </div>
            
            <p class="text-center text-gray-300">
                Belum punya akun? 
                <a href="/register" class="text-green-300 hover:text-green-200 font-medium">Daftar sekarang</a>
            </p>
        </form>
    </div>
</body>
</html>