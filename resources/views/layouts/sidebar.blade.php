<div class="flex items-center gap-2 border-2 rounded-lg shadow-md py-4 px-2 bg-green-50">
        <div class="size-20 bg-blue-500 rounded-full">
            @if(Auth::user()->profile_photo)
                <img src="{{ auth()->user()->profile_photo_path 
                    ? asset('storage/' . auth()->user()->profile_photo_path)
                    : asset('img/default-avatar.png') }}" 
                    alt="Foto Profil" class="w-full h-full rounded-full object-cover">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Foto Profil" class="w-full h-full rounded-full object-cover">
            @endif
        </div>
    <div>
        <h2 class="font-bold text-2xl">{{ Auth::user()->shop_name ?? 'Belum mengatur nama toko' }}</h2>
        <p class="text-xs font-bold text-gray-600">Sayuran Disini Pasti Fresh</p>
        <p class="text-xs text-gray-600 mb-2">Rating: 4.5 (405)</p>
        <span class="bg-gray-200 text-green-600 text-xs font-bold me-2 px-2 pb-1 py-0.5 rounded-md">Toko Buka</span>
    </div>
</div>

<nav class="mt-4 border-2 rounded-lg shadow-md">
    <ul>
        <a href="{{ route('dashboard-penjual') }}">
            <li class="py-2 px-4 hover:bg-gray-200 rounded cursor-pointer @if(Request::is('dashboard') || Request::is('dashboard-penjual/*')) bg-gray-200 text-gray-500 @else text-gray-600 @endif">
                <i class="fas fa-home mr-2 text-xl"></i>
                Dashboard
            </li>
        </a>
        <!-- <a href="{{ route('products.create') }}">
            <li class="py-2 px-4 hover:bg-gray-200 rounded cursor-pointer @if(Request::is('products/create') || Request::routeIs('products.create')) bg-gray-200 text-gray-500 @else text-gray-600 @endif">
                <i class="fas fa-plus-circle mr-2 text-xl"></i>
                Tambah Produk
            </li>
        </a> -->
        <a href="{{ route('products.index') }}">
            <li class="py-2 px-4 hover:bg-gray-200 rounded cursor-pointer @if(Request::is('products') || Request::is('products/*') && !Request::is('products/create')) bg-gray-200 text-gray-500 @else text-gray-600 @endif">
                <i class="fas fa-box mr-2 text-xl"></i>
                Daftar Produk
            </li>
        </a>
        <a href="{{ route('seller.edit') }}">
            <li class="py-2 px-4 hover:bg-gray-200 rounded cursor-pointer @if(Request::is('pengaturan')) bg-gray-200 text-gray-500 @else text-gray-600 @endif">
                <i class="fas fa-cog mr-2 text-xl"></i>
                Pengaturan
            </li>
        </a>
    </ul>
</nav>