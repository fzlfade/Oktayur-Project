@extends('layouts.customer_app')

@section('title', $product->nama_produk . ' - Oktayur')

@section('content')
<nav class="bg-white shadow-md py-4 px-4 md:px-8 flex flex-col md:flex-row justify-between items-center sticky top-0 z-50">
    <div class="flex items-center mb-4 md:mb-0">
        <div class="text-2xl md:text-3xl font-bold text-green-600 flex items-center">
            <i class="fas fa-leaf mr-2"></i>
            Oktayur
        </div>
    </div>
    
    <div class="flex items-center space-x-4">
        <a href="{{ route('products.customer.index') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full font-medium transition duration-300 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
</nav>

<main class="container mx-auto p-4">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="md:flex">
            <!-- Gambar Produk -->
            <div class="md:w-1/2 p-6 flex items-center justify-center bg-gray-50">
                <img 
                    class="w-full h-96 object-contain" 
                    src="{{ asset('storage/' . $product->gambar) }}" 
                    alt="{{ $product->nama_produk }}"
                >
            </div>
            
            <!-- Detail Produk -->
            <div class="md:w-1/2 p-8">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ $product->nama_produk }}</h1>
                        <div class="inline-block bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full mt-2">
                            <i class="fas fa-leaf mr-1"></i> Fresh
                        </div>
                    </div>
                    <div class="flex items-center text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span class="ml-2 text-sm text-gray-500">{{ $product->rating }}</span>
                    </div>
                </div>
                
                <div class="my-6">
                    <div class="text-3xl font-bold text-green-600">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                        <span class="text-base font-normal text-gray-500">/kg</span>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi Produk</h3>
                    <p class="text-gray-600">{{ $product->deskripsi }}</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-4 mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Informasi Toko</h3>
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                            <i class="fas fa-store text-gray-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">{{ $product->shop_name }}</p>
                            <p class="text-sm text-gray-500">{{ $product->distance }} km dari lokasi Anda</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                            <i class="fas fa-phone text-gray-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">{{ $seller->whatsapp }}</p>
                            <p class="text-sm text-gray-500">Hubungi penjual via WhatsApp</p>
                        </div>
                    </div>
                </div>
                
                <!-- Tombol Beli -->
                <div class="mt-10">
                    <a 
                        href="https://wa.me/{{ $seller->whatsapp }}?text=Saya%20tertarik%20untuk%20membeli%20produk%20{{ $product->nama_produk }}%20dengan%20harga%20Rp%20{{ number_format($product->harga,0,',','.') }}%20per%20kg.%20Apakah%20masih%20tersedia?" 
                        target="_blank"
                        class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold py-4 px-6 rounded-xl flex items-center justify-center text-center shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300"
                    >
                        <i class="fab fa-whatsapp text-2xl mr-3"></i>
                        <span class="text-xl">Beli Sekarang</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection