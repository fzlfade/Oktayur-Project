@extends('layouts.app')

@section('title', 'Dashboard Penjual')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Dashboard Toko</h1>
    <p class="text-gray-600 mt-2">Ringkasan aktivitas dan kinerja toko Anda</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl shadow-lg p-6 border border-green-100 transform transition-all duration-300 hover:-translate-y-1">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm font-medium">Total Items</p>
                <p class="text-2xl font-bold text-gray-800 mt-2">2</p>
            </div>
            <div class="p-3 bg-green-100 rounded-xl">
                <i class="fas fa-exclamation-circle text-green-600 text-xl"></i>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('products.index') }}" class="text-green-600 hover:text-green-800 text-sm font-medium flex items-center">
                Kelola stok
                <i class="fas fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl shadow-lg p-6 border border-blue-100 transform transition-all duration-300 hover:-translate-y-1">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm font-medium">Ulasan Baru</p>
                <p class="text-2xl font-bold text-gray-800 mt-2">27</p>
            </div>
            <div class="p-3 bg-blue-100 rounded-xl">
                <i class="fas fa-comment-dots text-blue-600 text-xl"></i>
            </div>
        </div>
        <div class="mt-6">
            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                Lihat ulasan
                <i class="fas fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-amber-50 to-yellow-50 rounded-2xl shadow-lg p-6 border border-amber-100 transform transition-all duration-300 hover:-translate-y-1">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm font-medium">Rating Toko</p>
                <p class="text-2xl font-bold text-gray-800 mt-2">4.8</p>
            </div>
            <div class="p-3 bg-amber-100 rounded-xl">
                <i class="fas fa-star text-amber-600 text-xl"></i>
            </div>
        </div>
        <div class="mt-6">
            <a href="#" class="text-amber-600 hover:text-amber-800 text-sm font-medium flex items-center">
                Lihat rating
                <i class="fas fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-purple-50 to-violet-50 rounded-2xl shadow-lg p-6 border border-purple-100 transform transition-all duration-300 hover:-translate-y-1">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm font-medium">Pengunjung</p>
                <p class="text-2xl font-bold text-gray-800 mt-2">122</p>
            </div>
            <div class="p-3 bg-purple-100 rounded-xl">
                <i class="fas fa-users text-purple-600 text-xl"></i>
            </div>
        </div>
        <div class="mt-6">
            <a href="#" class="text-purple-600 hover:text-purple-800 text-sm font-medium flex items-center">
                Lihat statistik
                <i class="fas fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Statistik Penjualan</h2>
        <select class="border border-gray-300 rounded-lg px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-green-300">
            <option>Minggu Ini</option>
            <option>Bulan Ini</option>
            <option>Tahun Ini</option>
        </select>
    </div>
    
    <div class="h-64 flex items-end space-x-2">
        <div class="flex-1 flex flex-col items-center">
            <div class="w-full bg-green-100 rounded-t-lg" style="height: 80%"></div>
            <span class="mt-2 text-xs text-gray-500">Sen</span>
        </div>
        <div class="flex-1 flex flex-col items-center">
            <div class="w-full bg-green-200 rounded-t-lg" style="height: 60%"></div>
            <span class="mt-2 text-xs text-gray-500">Sel</span>
        </div>
        <div class="flex-1 flex flex-col items-center">
            <div class="w-full bg-green-300 rounded-t-lg" style="height: 90%"></div>
            <span class="mt-2 text-xs text-gray-500">Rab</span>
        </div>
        <div class="flex-1 flex flex-col items-center">
            <div class="w-full bg-green-400 rounded-t-lg" style="height: 75%"></div>
            <span class="mt-2 text-xs text-gray-500">Kam</span>
        </div>
        <div class="flex-1 flex flex-col items-center">
            <div class="w-full bg-green-500 rounded-t-lg" style="height: 95%"></div>
            <span class="mt-2 text-xs text-gray-500">Jum</span>
        </div>
        <div class="flex-1 flex flex-col items-center">
            <div class="w-full bg-green-600 rounded-t-lg" style="height: 50%"></div>
            <span class="mt-2 text-xs text-gray-500">Sab</span>
        </div>
        <div class="flex-1 flex flex-col items-center">
            <div class="w-full bg-green-700 rounded-t-lg" style="height: 30%"></div>
            <span class="mt-2 text-xs text-gray-500">Min</span>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Produk Terpopuler</h2>
            <a href="{{ route('products.index') }}" class="text-green-600 hover:text-green-800 text-sm font-medium">Lihat semua</a>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-xl bg-gray-200 border-2 border-dashed flex-shrink-0"></div>
                <div class="ml-4 flex-1">
                    <h3 class="font-medium text-gray-800">Tomat Segar</h3>
                    <p class="text-gray-600 text-sm">Rp 17.300/kg</p>
                </div>
                <div class="text-right">
                    <p class="text-gray-800 font-medium">42 terjual</p>
                    <div class="flex text-yellow-400 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-xl bg-gray-200 border-2 border-dashed flex-shrink-0"></div>
                <div class="ml-4 flex-1">
                    <h3 class="font-medium text-gray-800">Wortel Organik</h3>
                    <p class="text-gray-600 text-sm">Rp 12.500/kg</p>
                </div>
                <div class="text-right">
                    <p class="text-gray-800 font-medium">38 terjual</p>
                    <div class="flex text-yellow-400 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-xl bg-gray-200 border-2 border-dashed flex-shrink-0"></div>
                <div class="ml-4 flex-1">
                    <h3 class="font-medium text-gray-800">Terong Ungu</h3>
                    <p class="text-gray-600 text-sm">Rp 10.600/kg</p>
                </div>
                <div class="text-right">
                    <p class="text-gray-800 font-medium">35 terjual</p>
                    <div class="flex text-yellow-400 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h2>
            <a href="#" class="text-green-600 hover:text-green-800 text-sm font-medium">Lihat semua</a>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="p-2 bg-green-100 rounded-lg mr-4">
                    <i class="fas fa-shopping-cart text-green-600"></i>
                </div>
                <div>
                    <h3 class="font-medium text-gray-800">Pesanan baru #ORD-12345</h3>
                    <p class="text-gray-600 text-sm">Rp 125.000 • 2 produk</p>
                    <p class="text-gray-500 text-xs mt-1">10 menit yang lalu</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="p-2 bg-blue-100 rounded-lg mr-4">
                    <i class="fas fa-star text-blue-600"></i>
                </div>
                <div>
                    <h3 class="font-medium text-gray-800">Ulasan baru dari Budi Santoso</h3>
                    <div class="flex text-yellow-400 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-500 text-xs mt-1">1 jam yang lalu</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="p-2 bg-amber-100 rounded-lg mr-4">
                    <i class="fas fa-exclamation-triangle text-amber-600"></i>
                </div>
                <div>
                    <h3 class="font-medium text-gray-800">Stok Cabai Merah hampir habis</h3>
                    <p class="text-gray-600 text-sm">Sisa 5 kg</p>
                    <p class="text-gray-500 text-xs mt-1">2 jam yang lalu</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection