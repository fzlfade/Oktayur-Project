<!-- resources/views/sellers/settings.blade.php -->
@extends('layouts.app')

@section('title', 'Pengaturan Penjual')

@section('content')
<div class="flex-1 p-6 bg-white border-2 rounded-xl overflow-y-auto overflow-x-auto">
    <h1 class="text-3xl font-bold mb-6">Pengaturan Toko</h1>
    
    <!-- Form Update Profil -->
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <form method="POST" action="{{ route('seller.update', Auth::id()) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Foto Profil</label>
                <div class="flex items-center space-x-4">
                    @if(Auth::user()->profile_photo)
                        <img src="{{ auth()->user()->profile_photo_path 
                            ? asset('storage/' . auth()->user()->profile_photo_path)
                            : asset('img/default-avatar.png') }}" 
                            alt="Foto Profil" class="w-16 h-16 rounded-full object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Foto Profil" class="w-16 h-16 rounded-full object-cover">
                    @endif
                    <input type="file" name="profile_photo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                @error('profile_photo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Penjual</label>
                <input type="text" name="name" 
                       value="{{ old('name', Auth::user()->name) }}"
                       class="w-full p-2 border rounded @error('name') border-red-500 @enderror">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Toko</label>
                <input type="text" name="shop_name" 
                       value="{{ old('shop_name', Auth::user()->shop_name) }}"
                       class="w-full p-2 border rounded @error('shop_name') border-red-500 @enderror">
                @error('shop_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nomor WhatsApp</label>
                <input type="text" name="whatsapp" 
                       value="{{ old('whatsapp', Auth::user()->whatsapp) }}"
                       class="w-full p-2 border rounded @error('whatsapp') border-red-500 @enderror">
                @error('whatsapp')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Alamat Toko</label>
                <textarea name="address" 
                          class="w-full p-2 border rounded @error('address') border-red-500 @enderror"
                          rows="3">{{ old('address', Auth::user()->address) }}</textarea>
                @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Simpan Perubahan
            </button>
        </form>

        <!-- Form Delete Akun -->
        <div class="mt-8 pt-4 border-t">
            <form method="POST" action="{{ route('seller.destroy', Auth::id()) }}">
                @csrf
                @method('DELETE')
                
                <button type="submit" 
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
                        onclick="return confirm('Yakin ingin menghapus akun?')">
                    <i class="fas fa-trash-alt mr-2"></i>Hapus Akun
                </button>
            </form>
        </div>
    </div>
</div>

@endsection