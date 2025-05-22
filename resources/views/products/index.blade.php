<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Daftar Produk</h2>
    <a href="{{ route('products.create') }}" 
       class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 transition">
        <i class="fas fa-plus mr-2"></i>Tambah Produk
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Gambar</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Nama Produk</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Harga</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Stok</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($products as $product)
            <tr>
                <td class="px-6 py-4">
                    <img src="{{ asset('storage/'.$product->gambar) }}" 
                         class="w-16 h-16 object-cover rounded" 
                         alt="{{ $product->nama_produk }}">
                </td>
                <td class="px-6 py-4 font-medium text-gray-900">
                    {{ $product->nama_produk }}
                </td>
                <td class="px-6 py-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                <td class="px-6 py-4">{{ $product->stok }}</td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('products.edit', $product->id) }}" 
                       class="text-blue-500 hover:text-blue-700">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-red-500 hover:text-red-700"
                                onclick="return confirm('Hapus produk ini?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                    Belum ada produk yang ditambahkan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $products->links() }}
</div>
@endsection