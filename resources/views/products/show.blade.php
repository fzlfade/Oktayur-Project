@extends('layouts.app')

@section('content')
  <div class="md:flex md:space-x-6">
    <img src="{{ asset('img/'.$product->image) }}" alt="{{ $product->name }}" class="w-full md:w-1/2 rounded shadow mb-4 md:mb-0">
    <div>
      <h1 class="text-4xl font-bold mb-4">{{ $product->name }}</h1>
      <p class="text-green-600 text-2xl font-semibold mb-6">Rp {{ number_format($product->price,0,',','.') }}/Kg</p>
      <p class="mb-6">{{ $product->description ?: 'Belum ada deskripsi.' }}</p>
      <button onclick="location.href='{{ route('product.checkout', $product->id) }}'"
          class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600">
        Beli via WhatsApp
      </button>
    </div>
  </div>
@endsection
