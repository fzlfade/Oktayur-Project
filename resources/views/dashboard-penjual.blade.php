@extends('layouts.app')

@section('title', 'Dashboard Penjual')

@section('content')
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
@endsection