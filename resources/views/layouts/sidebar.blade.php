<div class="flex items-center gap-4 p-4 rounded-xl shadow-md bg-gradient-to-r from-green-50 to-emerald-50 mb-6">
    <div class="flex-shrink-0">
        @if(Auth::user()->profile_photo_path)
            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" 
                 alt="Foto Profil" 
                 class="w-16 h-16 rounded-full object-cover border-2 border-white shadow">
        @else
            <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16 flex items-center justify-center text-gray-500">
                <i class="fas fa-user text-xl"></i>
            </div>
        @endif
    </div>
    <div>
        <h2 class="font-bold text-lg text-gray-800">{{ Auth::user()->shop_name ?? 'Belum mengatur nama toko' }}</h2>
        <p class="text-xs text-gray-600 mb-1">Sayuran Disini Pasti Fresh</p>
        <div class="flex items-center">
            <div class="flex text-yellow-400 text-xs">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span class="text-xs text-gray-600 ml-1">4.5 (405)</span>
        </div>
        <span class="bg-green-100 text-green-800 text-xs font-bold px-2 py-0.5 rounded-full mt-1 inline-block">
            Toko Buka
        </span>
    </div>
</div>

<nav class="space-y-1">
    <a href="{{ route('dashboard-penjual') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-100 rounded-xl transition-all duration-300 group @if(Request::is('dashboard') || Request::is('dashboard-penjual/*')) bg-green-100 text-green-700 font-medium @endif">
        <i class="fas fa-home text-lg text-gray-500 group-hover:text-green-600 @if(Request::is('dashboard') || Request::is('dashboard-penjual/*')) text-green-600 @endif mr-3"></i>
        <span>Dashboard</span>
    </a>
    
    <a href="{{ route('products.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-100 rounded-xl transition-all duration-300 group @if(Request::is('products') || Request::is('products/*')) bg-green-100 text-green-700 font-medium @endif">
        <i class="fas fa-box text-lg text-gray-500 group-hover:text-green-600 @if(Request::is('products') || Request::is('products/*')) text-green-600 @endif mr-3"></i>
        <span>Daftar Produk</span>
    </a>
    
    <a href="{{ route('seller.edit') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-100 rounded-xl transition-all duration-300 group @if(Request::is('pengaturan')) bg-green-100 text-green-700 font-medium @endif">
        <i class="fas fa-cog text-lg text-gray-500 group-hover:text-green-600 @if(Request::is('pengaturan')) text-green-600 @endif mr-3"></i>
        <span>Pengaturan</span>
    </a>
</nav>