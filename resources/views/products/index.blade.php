@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Daftar Produk</h1>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($products as $product)
                <tr>
                    <td class="px-6 py-4">{{ $product->nama_produk }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $product->stok }}</td>
                    <td class="px-6 py-4">{{ $product->kategori }}</td>
                    <td class="px-6 py-4">

                        <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form class="inline-block" action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Hapus</button>
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
</div>
@endsection