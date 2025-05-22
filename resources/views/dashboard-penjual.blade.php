<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Penjual</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">

  <!-- navbar -->
  <div class="bg-white shadow-md p-4 flex justify-between items-center">
    <div class="flex gap-2">
      <div class="text-2xl font-bold">Oktayur</div>
      <div class="text-l font-bold text-gray-500 pt-1">Penjual</div>
    </div>
    <div class="flex w-1/3 items-center gap-2">
      <input type="text" placeholder="Stok, Ulasan Baru, Rating" class="w-full p-2 shadow-md border rounded-full">
      <i class="fas fa-search left-3 top-3 text-gray-500"></i>
    </div>
    <div class="flex items-center space-x-4">
      <i class="fas fa-bell text-xl text-gray-600">
      </i>
      <div class="w-10 h-10 bg-blue-500 rounded-full"></div>
          <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="bg-red-500 text-white p-2 rounded">
          Logout
      </button>
    </form>
    </div>
  </div>
  
  <div class="flex h-screen gap-2">
    <!-- sidebar -->
    <div class="w-1/5 bg-white shadow-md p-4 border-2 rounded-xl">
      <div class="flex items-center gap-2 border-2 rounded-lg shadow-md py-4 px-2 bg-green-50">
        <div>
          <div class="size-20 bg-blue-500 rounded-full"></div>
        </div>
        <div>
          <h2 class="font-bold text-2xl">Pak Kamis</h2>
          <p class="text-xs font-bold text-gray-600">Sayuran Disini Pasti Fresh</p>
          <p class="text-xs text-gray-600 mb-2">Rating: 4.5 (405)</p>
          <span class="bg-gray-200 text-green-600 text-xs font-bold me-2 px-2 pb-1 py-0.5 rounded-md">Toko Buka</span>
        </div>
      </div>
      <nav class="mt-4 border-2 rounded-lg shadow-md">
        <ul>
          <a href="/penjual/dashboard.html">
            <li class="py-2 px-4 hover:bg-gray-200 text-gray-500 bg-gray-200 rounded cursor-pointer">
              <i class="fas fa-home mr-2 text-xl"></i>
              Dashboard
            </li>
          </a>
          <a href="/penjual/produk.html">
            <li class="py-2 px-4 hover:bg-gray-200 rounded cursor-pointer">
              <i class="fas fa-box mr-2 text-xl text-gray-600"></i>
              Produk
            </li>
          </a>
          <a href="/penjual/pengaturan.html">
            <li class="py-2 px-4 hover:bg-gray-200 rounded cursor-pointer">
              <i class="fas fa-cog mr-2 text-xl text-gray-600"></i>
              Pengaturan
            </li>
          </a>
        </ul>
      </nav>
    </div>
    
    <!-- hal utaman -->
    <div class="flex-1 p-6 bg-white border-2 rounded-xl">
      <h1 class="text-3xl font-bold mb-4">Analisis Toko</h1>
      <div class="grid grid-cols-4 gap-4">
        <div class="p-6 bg-white shadow-md rounded-lg border-2 border-gray-300 text-center">
          <p class="text-gray-600">Stok perlu diupdate</p>
          <p class="text-3xl font-bold">9</p>
        </div>
        <div class="p-6 bg-white shadow-md rounded-lg border-2 border-gray-300 text-center">
          <p class="text-gray-600">Ulasan baru</p>
          <p class="text-3xl font-bold">27</p>
        </div>
        <div class="p-6 bg-white shadow-md rounded-lg border-2 border-gray-300 text-center">
          <p class="text-gray-600">Rating baru</p>
          <p class="text-3xl font-bold">32</p>
        </div>
        <div class="p-6 bg-white shadow-md rounded-lg border-2 border-gray-300 text-center">
          <p class="text-gray-600">Pengunjung</p>
          <p class="text-3xl font-bold">122</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
