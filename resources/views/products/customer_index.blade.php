@extends('layouts.customer_app')

@section('title', 'Belanja Sayur - Oktayur')

@section('content')
<!-- <div class="bg-white shadow-md p-4 flex flex-col md:flex-row justify-between items-center gap-4">
    <div class="flex items-center gap-2">
        <div class="text-2xl font-bold text-green-600">Oktayur</div>
        <div class="hidden md:block text-sm text-gray-500">Fresh Vegetables Every Day</div>
    </div>
    
    <form method="GET" action="{{ route('products.customer.index') }}" class="relative w-full md:w-3/4">
        <input 
            type="text" 
            name="search"
            value="{{ $filters['search'] }}"
            placeholder="Cari produk sayur..." 
            class="w-full p-3 pl-10 shadow-md border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-green-300"
        >
        <button type="submit" class="absolute left-3 top-3.5 text-gray-400">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div> -->

<nav class="bg-white shadow-md py-4 px-4 md:px-8 flex flex-col md:flex-row justify-between items-center sticky top-0 z-50">
        <div class="flex items-center mb-4 md:mb-0">
            <a href="/">
                <div class="text-2xl md:text-3xl font-bold text-green-600 flex items-center">
                    <i class="fas fa-leaf mr-2"></i>
                    Oktayur
                </div>
            </a>
        </div>
        
        <form method="GET" action="{{ route('products.customer.index') }}" class="relative w-full md:w-1/3 mb-4 md:mb-0">
            <input 
                type="text" 
                name="search"
                value="{{ $filters['search'] }}"
                placeholder="Cari produk sayur..." 
                class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-300"
            >
            <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
        </form>
        
        <div class="flex items-center space-x-4">
            <a href="/" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full font-medium transition duration-300 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </nav>

<main class="container mx-auto p-4 flex flex-col md:flex-row gap-6">
    <aside class="w-full md:w-1/4 bg-white p-4 rounded-lg shadow-md overflow-y-auto">
        <form method="GET" action="{{ route('products.customer.index') }}">
            <input type="hidden" name="search" value="{{ $filters['search'] }}">
            
            <h2 class="text-xl font-bold mb-4 text-gray-800">Filter Produk</h2>
            
            <div class="mb-6">
                <h3 class="font-semibold text-gray-700 mb-2">Kategori Sayuran</h3>
                <div class="space-y-2">
                    @foreach($categories as $category)
                    <label class="flex items-center gap-2 text-gray-600">
                        <input 
                            type="checkbox" 
                            name="categories[]" 
                            value="{{ $category }}" 
                            class="rounded text-green-500 focus:ring-green-400"
                            {{ in_array($category, $filters['categories']) ? 'checked' : '' }}
                        >
                        <span>{{ $category }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
            
            <div class="mb-6">
                <h3 class="font-semibold text-gray-700 mb-2">Rentang Harga</h3>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Rp {{ number_format($filters['min_price'], 0, ',', '.') }}</span>
                            <span>Rp {{ number_format($filters['max_price'], 0, ',', '.') }}</span>
                        </div>
                        <div class="flex gap-2">
                            <div class="flex-1">
                                <label class="text-sm text-gray-600 mb-1 block">Minimal</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-2.5 text-gray-500 text-sm">Rp</span>
                                    <input 
                                        type="number" 
                                        name="min_price" 
                                        value="{{ $filters['min_price'] }}"
                                        min="0"
                                        class="w-full pl-8 p-2 border border-gray-200 rounded-md"
                                    >
                                </div>
                            </div>
                            <div class="flex-1">
                                <label class="text-sm text-gray-600 mb-1 block">Maksimal</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-2.5 text-gray-500 text-sm">Rp</span>
                                    <input 
                                        type="number" 
                                        name="max_price" 
                                        value="{{ $filters['max_price'] }}"
                                        min="0"
                                        class="w-full pl-8 p-2 border border-gray-200 rounded-md"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md font-medium transition">
                        Terapkan Filter
                    </button>
                </div>
            </div>
            
            <div class="mb-6">
                <h3 class="font-semibold text-gray-700 mb-2">Kondisi Sayuran</h3>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-gray-600">
                        <input 
                            type="checkbox" 
                            name="conditions[]" 
                            value="organic" 
                            class="rounded text-green-500 focus:ring-green-400"
                            {{ in_array('organic', $filters['conditions']) ? 'checked' : '' }}
                        >
                        <span>Organik</span>
                    </label>
                    <label class="flex items-center gap-2 text-gray-600">
                        <input 
                            type="checkbox" 
                            name="conditions[]" 
                            value="fresh" 
                            class="rounded text-green-500 focus:ring-green-400"
                            {{ in_array('fresh', $filters['conditions']) ? 'checked' : '' }}
                        >
                        <span>Segar Hari Ini</span>
                    </label>
                </div>
            </div>
            
            <button type="submit" class="w-full py-2 px-4 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-100 transition">
                Reset Filter
            </button>
        </form>
    </aside>
    
    <section class="flex-1">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Sayuran Segar</h2>
            <div class="flex items-center gap-2">
                <span class="text-gray-600">Urutkan:</span>
                <form method="GET" action="{{ route('products.customer.index') }}" class="ml-2">
                    <input type="hidden" name="search" value="{{ $filters['search'] }}">
                    <input type="hidden" name="min_price" value="{{ $filters['min_price'] }}">
                    <input type="hidden" name="max_price" value="{{ $filters['max_price'] }}">
                    @foreach($filters['categories'] as $category)
                        <input type="hidden" name="categories[]" value="{{ $category }}">
                    @endforeach
                    @foreach($filters['conditions'] as $condition)
                        <input type="hidden" name="conditions[]" value="{{ $condition }}">
                    @endforeach
                    
                    <select 
                        name="sort" 
                        onchange="this.form.submit()"
                        class="border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-green-300"
                    >
                        <option value="popular" {{ $filters['sort'] == 'popular' ? 'selected' : '' }}>Populer</option>
                        <option value="low_price" {{ $filters['sort'] == 'low_price' ? 'selected' : '' }}>Harga Terendah</option>
                        <option value="high_price" {{ $filters['sort'] == 'high_price' ? 'selected' : '' }}>Harga Tertinggi</option>
                        <option value="rating" {{ $filters['sort'] == 'rating' ? 'selected' : '' }}>Rating Tertinggi</option>
                        <option value="newest" {{ $filters['sort'] == 'newest' ? 'selected' : '' }}>Terbaru</option>
                    </select>
                </form>
            </div>
        </div>
        
        @if($products->isEmpty())
            <div class="bg-white rounded-lg shadow-md p-8 text-center">
                <i class="fas fa-leaf text-5xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Sayuran tidak ditemukan</h3>
                <p class="text-gray-500 mb-4">Coba gunakan kata kunci atau filter yang berbeda</p>
                <a href="{{ route('products.customer.index') }}" class="text-green-500 hover:text-green-600 font-medium">
                    <i class="fas fa-sync-alt mr-2"></i>Reset Pencarian
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                <a href="{{ route('products.customer.show', $product) }}" class="product-card bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="relative">
                        <img 
                            src="{{ asset('storage/' . $product->gambar) }}" 
                            alt="{{ $product->nama_produk }}" 
                            class="w-full h-48 object-cover"
                        >
                        @if($product->created_at > now()->subDays(3))
                            <div class="absolute top-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full">Baru</div>
                        @endif
                        @if($product->is_organic)
                            <div class="absolute top-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full">Organik</div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800 mb-1">{{ $product->nama_produk }}</h3>
                        <div class="flex justify-between items-center">
                            <p class="text-lg font-bold text-green-600">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                                <span class="text-sm font-normal text-gray-500">/Kg</span>
                            </p>
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star text-xs"></i>
                                <span class="text-xs text-gray-600 ml-1">{{ $product->rating }}</span>
                            </div>
                        </div>
                        <div class="mt-2 flex justify-between items-center text-sm text-gray-500">
                            <span><i class="fas fa-store mr-1"></i>{{ $product->shop_name }}</span>
                            <span><i class="fas fa-location-dot mr-1"></i>{{ $product->distance }} km</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            
            <div class="mt-8">
                {{ $products->appends($filters)->links('vendor.pagination.tailwind') }}
            </div>
        @endif
    </section>
</main>


@endsection

@section('scripts')
<script>
    function updateCartCount(count) {
        document.querySelectorAll('.cart-count').forEach(el => {
            el.textContent = count;
        });
    }
    
    updateCartCount(3);
</script>
@endsection