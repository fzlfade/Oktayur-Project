@extends('layouts.app')

@section('content')
  <h1 class="text-3xl mb-6">Daftar Produk</h1>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($products as $p)
      <div class="bg-white p-4 rounded shadow">
        <a href="{{ route('product.show', $p->slug) }}">
          <img src="{{ asset('img/'.$p->image) }}" alt="{{ $p->name }}" class="w-full h-48 object-cover mb-4">
          <h2 class="text-xl font-semibold">{{ $p->name }}</h2>
          <p class="text-green-600 font-bold">Rp {{ number_format($p->price,0,',','.') }}/Kg</p>
        </a>
      </div>
    @endforeach
  </div>
@endsection
