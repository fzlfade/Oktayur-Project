<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oktayur - Sayuran Segar Langsung dari Petani</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#10B981',
                        secondary: '#059669',
                        dark: '#065F46',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), url('https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'));
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
        }
        
        .vegetable-card {
            transition: all 0.3s ease;
            transform: translateY(0);
        }
        
        .vegetable-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .feature-card {
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: scale(1.05);
        }
        
        .testimonial-card {
            transition: all 0.3s ease;
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
        }
        
        .floating-btn {
            animation: pulse-slow 3s infinite;
        }
    </style>
</head>
<body class="font-poppins bg-green-800">
    <nav class="bg-white shadow-md py-3 px-4 md:px-6 flex flex-col md:flex-row justify-between items-center sticky top-0 z-50">
        <div class="flex items-center mb-4 md:mb-0">
            <a href="/">
                <div class="text-2xl md:text-3xl font-bold text-green-600 flex items-center">
                    <i class="fas fa-leaf mr-2"></i>
                    Oktayur
                </div>
            </a>
        </div>
        
       
        
        <div class="flex items-center space-x-4">

            <a href="/dashboard" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full font-medium transition duration-300 flex items-center">
                <i class="fas fa-store mr-2"></i> Mitra Oktayur
            </a>
        </div>
    </nav>

    <section class="hero-section flex items-center justify-center text-center">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 animate__animated animate__fadeInDown">
                    <span class="text-green-300">Sayuran Segar</span> Langsung dari Petani
                </h1>
                <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">
                    Dapatkan sayuran segar setiap hari dengan kualitas terbaik dan harga terjangkau. Dapurmu butuh sayurku!
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/produk" class="bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-full text-lg font-medium transition duration-300 transform hover:scale-105">
                        Belanja Sekarang
                    </a>
                    <a href="#features" class="bg-white hover:bg-gray-100 text-green-600 px-8 py-3 rounded-full text-lg font-medium transition duration-300 border border-green-500">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- <section id="products" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Sayuran Terpopuler</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Pilihan sayuran segar favorit pelanggan kami</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <div class="vegetable-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                             alt="Berbagai Sayuran" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full">Fresh</div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Paket Sayuran Sehat</h3>
                        <p class="text-gray-600 mb-4">Berisi 5 jenis sayuran segar untuk kebutuhan harian</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rp 45.000</span>
                             
                        </div>
                    </div>
                </div>
                
                <div class="vegetable-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1566385101042-1a0aa0c1268c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2068&q=80" 
                             alt="Tomat" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Tomat Segar</h3>
                        <p class="text-gray-600 mb-4">Tomat merah segar langsung dari kebun</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rp 17.300/kg</span>
                             
                        </div>
                    </div>
                </div>
                
                <div class="vegetable-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1522184216316-3c25379f9760?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                             alt="Wortel" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full">Organic</div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Wortel Organik</h3>
                        <p class="text-gray-600 mb-4">Wortel segar tanpa pestisida</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rp 12.500/kg</span>
                             
                        </div>
                    </div>
                </div>
                
                <div class="vegetable-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1598170845058-32b9d6a5da37?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80" 
                             alt="Terong" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">Terong Ungu</h3>
                        <p class="text-gray-600 mb-4">Terong segar hasil panen pagi hari</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">Rp 10.600/kg</span>
                             
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="/produk" class="inline-block bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-full text-lg font-medium transition duration-300">
                    Lihat Semua Produk <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section> -->

    <section id="features" class="py-16 bg-green-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Kenapa Memilih Oktayur?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Kami memberikan pengalaman berbelanja sayur terbaik untuk Anda</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="feature-card bg-white p-8 rounded-xl shadow-md text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shipping-fast text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Pengiriman Cepat</h3>
                    <p class="text-gray-600">Sayuran segar diantar langsung ke dapur Anda dalam waktu 2 jam</p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-xl shadow-md text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-seedling text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Segar & Organik</h3>
                    <p class="text-gray-600">Sayuran dipetik langsung dari kebun pada hari yang sama</p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-xl shadow-md text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-tag text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Harga Terjangkau</h3>
                    <p class="text-gray-600">Harga langsung dari petani tanpa perantara</p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-xl shadow-md text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-headset text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Dukungan 24/7</h3>
                    <p class="text-gray-600">Tim kami siap membantu kapan saja Anda membutuhkan</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Apa Kata Pelanggan Kami?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Lihat pengalaman nyata dari pelanggan yang puas dengan layanan kami</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="testimonial-card bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                        <div>
                            <h4 class="font-bold text-gray-800">Agus</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Sayuran selalu segar dan pengirimannya tepat waktu. Sekeluarga jadi lebih sehat berkat Oktayur!"</p>
                </div>
                
                <div class="testimonial-card bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                        <div>
                            <h4 class="font-bold text-gray-800">Siti Mutmainah</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Sebagai ibu rumah tangga, saya sangat terbantu dengan layanan Oktayur. Sayurannya segar dan harganya lebih murah dari pasar."</p>
                </div>
                
                <div class="testimonial-card bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                        <div>
                            <h4 class="font-bold text-gray-800">Ahmad Fadzil</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Sebagai pemilik restoran, kualitas sayuran sangat penting. Oktayur selalu menyediakan sayuran premium dengan kualitas terbaik."</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-green-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Memulai Pengalaman Belanja Sayur yang Lebih Baik?</h2>
            <p class="text-green-100 text-xl mb-8 max-w-3xl mx-auto">Bergabunglah dengan ribuan Mitra yang sudah merasakan manfaat berbelanja sayur di Oktayur</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                
                <a href="{{route('register')}}" class="bg-green-800 hover:bg-green-900 text-white px-8 py-3 rounded-full text-lg font-medium transition duration-300 border border-green-700">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </section>

    <footer class="bg-gray-800 text-white pt-12 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div>
                <h3 class="text-2xl font-bold text-green-400 mb-4 flex items-center">
                    <i class="fas fa-leaf mr-2"></i> Oktayur
                </h3>
                <p class="text-gray-400 mb-4">Menyediakan sayuran segar langsung dari petani ke dapur Anda.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-green-400">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-green-400">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-green-400">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-green-400">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            
            <div>
                <h4 class="text-lg font-bold mb-4">Tautan Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-green-400">Beranda</a></li>
                    <li><a href="#products" class="text-gray-400 hover:text-green-400">Produk</a></li>
                    <li><a href="#features" class="text-gray-400 hover:text-green-400">Keunggulan</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-400">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-green-400">Kontak</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-bold mb-4">Kontak Kami</h4>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt text-green-400 mt-1 mr-3"></i>
                        <span class="text-gray-400">Jl. Buton Cemara Asri, Kedungsari, Magelang Utara, Kota Magelang</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-phone text-green-400 mt-1 mr-3"></i>
                        <span class="text-gray-400">(0857) 7295-1900</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-envelope text-green-400 mt-1 mr-3"></i>
                        <span class="text-gray-400">info@oktayur.com</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-700 pt-6 text-center">
            <p class="text-gray-400">© 2023 Oktayur. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>


    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>