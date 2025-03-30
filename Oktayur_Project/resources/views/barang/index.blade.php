<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Penjual</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    .switch {
      position: relative;
      display: inline-block;
      width: 40px;
      height: 20px;
    }
    .switch input { 
      opacity: 0; 
      width: 0; 
      height: 0; 
    }
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: #ccc;
      transition: .4s;
      border-radius: 34px;
    }
    .slider:before {
      position: absolute;
      content: \"\";
      height: 14px;
      width: 14px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }
    input:checked + .slider {
      background-color: #4ade80;
    }
    input:focus + .slider {
      box-shadow: 0 0 1px #4ade80;
    }
    input:checked + .slider:before {
      transform: translateX(20px);
    }
  </style>
</head>
<body class="bg-gray-100">

  <!-- navbar -->
  <div class="bg-white shadow-md p-4 flex justify-between items-center">
    <div class="flex gap-2">
      <div class="text-2xl font-bold">Oktayur</div>
      <div class="text-l font-bold text-gray-500 pt-1">Penjual</div>
    </div>
    <div class="flex w-1/3 items-center gap-2">
      <input type="text" placeholder="Cari Barang" class="w-full p-2 shadow-md border rounded-full">
      <i class="fas fa-search left-3 top-3 text-gray-500"></i>
    </div>
    <div class="flex items-center space-x-4">
      <i class="fas fa-bell text-xl text-gray-600"></i>
      <div class="w-10 h-10 bg-blue-500 rounded-full"></div>
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
            <li class="py-2 px-4 hover:bg-gray-200 rounded cursor-pointer">
              <i class="fas fa-home mr-2 text-xl text-gray-600"></i>
              Dashboard
            </li>
          </a>
          <a href="/penjual/produk.html">
            <li class="py-2 px-4 hover:bg-gray-200 text-gray-500 bg-gray-200 rounded cursor-pointer">
              <i class="fas fa-box mr-2 text-xl"></i>
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
    
    <!-- Halaman Produk -->
    <div class="flex-1 p-6 bg-white border-2 rounded-xl overflow-y-auto">
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Daftar Produk</h1>
          <a href="{{ route('penjual.barang.create') }}">
            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded font-bold">+ Tambah Produk</button>
          </a>
      </div>

      <div class="flex space-x-4 mb-6 border-b pb-2">
        <a href="#" class="text-green-600 font-semibold border-b-2 border-green-600 pb-2">
          Semua Produk (66)
        </a>
        <a href="#" class="text-gray-600 hover:text-green-600 pb-2">
          Produk Ditampilkan (125)
        </a>
        <a href="#" class="text-gray-600 hover:text-green-600 pb-2">
          Draft (9)
        </a>
      </div>

      <!-- Tabel Produk -->
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
          <thead>
            <tr class="border-b">
              <th class="px-4 py-3 text-left w-10">
                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-600">
              </th>
              <th class="px-4 py-3 text-left">INFORMASI PRODUK</th>
              <th class="px-4 py-3 text-left">STATISTIK</th>
              <th class="px-4 py-3 text-left">HARGA</th>
              <th class="px-4 py-3 text-left">STOK</th>
              <th class="px-4 py-3 text-left">TAMPILKAN</th>
            </tr>
          </thead>
          <tbody class="divide-y">
          @foreach($barangs as $barang)
            <!-- Baris 1 -->
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-3">
                <input type="checkbox" class="form-checkbox h-5 w-5 text-green-600">
              </td>
              <td class="px-4 py-3 flex items-center gap-3">
                <img src="https://via.placeholder.com/50" alt="Brokoli" class="w-12 h-12 object-cover rounded-md">
                <span class="font-semibold">{{ $barang->nama }}</span>
              </td>
              <td class="px-4 py-3 text-sm text-gray-700">Baik</td>
              <td class="px-4 py-3 text-sm text-gray-700">{{ $barang->harga }}</td>
              <td class="px-4 py-3 text-sm text-gray-700">{{ $barang->stok }}</td>
              <td class="px-4 py-3">
                <label class="switch">
                  <input type="checkbox" checked>
                  <span class="slider"></span>
                </label>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
