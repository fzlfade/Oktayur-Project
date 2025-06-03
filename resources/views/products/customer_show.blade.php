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
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <div class="md:flex">
            <div class="md:flex-shrink-0">
                <img class="h-64 w-full object-cover md:w-64" src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}">
            </div>
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-green-600 font-semibold">{{ $product->kategori }}</div>
                <h1 class="block mt-1 text-2xl font-bold text-gray-900">{{ $product->nama_produk }}</h1>
                <p class="mt-2 text-gray-600">{{ $product->deskripsi }}</p>
                <div class="mt-4">
                    <span class="text-2xl font-bold text-green-600">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                    <span class="text-sm text-gray-500">/kg</span>
                </div>
                <div class="mt-2 flex items-center">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <span class="ml-2 text-sm text-gray-500">{{ $product->rating }}</span>
                </div>
                <div class="mt-4">
                    <p class="text-gray-700"><i class="fas fa-store mr-2"></i>{{ $product->shop_name }}</p>
                    <p class="text-gray-700 mt-1"><i class="fas fa-location-dot mr-2"></i>{{ $product->distance }} km</p>
                    <p class="text-gray-700 mt-1"><i class="fas fa-phone mr-2"></i>{{ $seller->whatsapp }}</p>
                </div>
                <div class="mt-6">
                    <a 
                        href="https://wa.me/{{ $seller->whatsapp }}?text=Saya%20tertarik%20untuk%20membeli%20produk%20{{ $product->nama_produk }}%20dengan%20harga%20Rp%20{{ number_format($product->harga,0,',','.') }}%20per%20kg.%20Apakah%20masih%20tersedia?" 
                        target="_blank"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center"
                    >
                        <i class="fab fa-whatsapp mr-2 text-xl"></i> Beli Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection