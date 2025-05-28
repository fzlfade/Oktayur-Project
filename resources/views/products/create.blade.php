@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Produk Baru</h1>
    
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="max-w-2xl bg-white p-6 rounded-lg shadow-md">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Produk</label>
            <input type="text" name="nama_produk" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
            <textarea name="deskripsi" class="w-full p-2 border rounded" rows="4" required></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                <input type="number" name="harga" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Stok</label>
                <input type="number" name="stok" class="w-full p-2 border rounded" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
            <select name="kategori" class="w-full p-2 border rounded">
                <option value="">...</option>
                <option value="Sayuran">Sayuran</option>
                <option value="Buah">Buah</option>
                <option value="Umbi">Umbi</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Produk</label>
            <input type="file" name="gambar" class="w-full p-2 border rounded @error('gambar') border-red-500 @enderror">
    
            @error('gambar')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Tambah Produk
        </button>
    </form>
</div>
@endsection