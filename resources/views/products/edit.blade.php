@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Produk</h1>
    
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" class="max-w-2xl bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Produk</label>
            <input type="text" name="nama_produk" 
                   value="{{ old('nama_produk', $product->nama_produk) }}" 
                   class="w-full p-2 border rounded @error('nama_produk') border-red-500 @enderror" required>
            @error('nama_produk')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
            <textarea name="deskripsi" 
                      class="w-full p-2 border rounded @error('deskripsi') border-red-500 @enderror" 
                      rows="4" required>{{ old('deskripsi', $product->deskripsi) }}</textarea>
            @error('deskripsi')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                <input type="number" name="harga" 
                       value="{{ old('harga', $product->harga) }}" 
                       class="w-full p-2 border rounded @error('harga') border-red-500 @enderror" required>
                @error('harga')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Stok</label>
                <input type="number" name="stok" 
                       value="{{ old('stok', $product->stok) }}" 
                       class="w-full p-2 border rounded @error('stok') border-red-500 @enderror" required>
                @error('stok')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
            <select name="kategori" class="w-full p-2 border rounded @error('kategori') border-red-500 @enderror">
                <option value="">Pilih Kategori</option>
                <option value="Sayuran" @selected(old('kategori', $product->kategori) == 'Sayuran')>Sayuran</option>
                <option value="Buah" @selected(old('kategori', $product->kategori) == 'Buah')>Buah</option>
                <option value="Umbi" @selected(old('kategori', $product->kategori) == 'Umbi')>Umbi</option>
            </select>
            @error('kategori')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Saat Ini</label>
            <img src="{{ asset('storage/'.$product->gambar) }}" class="w-32 h-32 object-cover mb-2">
            <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Baru (Opsional)</label>
            <input type="file" name="gambar" 
                   class="w-full p-2 border rounded @error('gambar') border-red-500 @enderror">
            @error('gambar')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Update Produk
        </button>
    </form>
</div>
@endsection