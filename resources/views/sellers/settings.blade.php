@extends('layouts.app')

@section('title', 'Pengaturan Penjual')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Pengaturan Toko</h1>
    <p class="text-gray-600 mt-2">Kelola informasi dan pengaturan toko Anda</p>
</div>

<!-- Alert Success/Error Messages -->
@if(session('success'))
<div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl p-4">
    <div class="flex items-center">
        <div class="p-2 bg-green-100 rounded-xl mr-3">
            <i class="fas fa-check-circle text-green-600"></i>
        </div>
        <p class="text-green-800 font-medium">{{ session('success') }}</p>
    </div>
</div>
@endif

@if(session('error'))
<div class="mb-6 bg-gradient-to-r from-red-50 to-rose-50 border border-red-200 rounded-2xl p-4">
    <div class="flex items-center">
        <div class="p-2 bg-red-100 rounded-xl mr-3">
            <i class="fas fa-exclamation-circle text-red-600"></i>
        </div>
        <p class="text-red-800 font-medium">{{ session('error') }}</p>
    </div>
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Settings Card -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-lg p-6 transform transition-all duration-300 hover:shadow-xl">
            <div class="flex items-center mb-6">
                <div class="p-3 bg-gradient-to-r from-blue-100 to-cyan-100 rounded-xl mr-4">
                    <i class="fas fa-user-edit text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Profil Toko</h2>
                    <p class="text-gray-600 text-sm">Update informasi dasar toko Anda</p>
                </div>
            </div>
            
            <form method="POST" action="{{ route('seller.update', Auth::id()) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Profile Photo Section -->
                <div class="mb-6 p-4 bg-gradient-to-r from-gray-50 to-slate-50 rounded-xl border border-gray-100">
                    <label class="block text-gray-700 text-sm font-bold mb-3">Foto Profil</label>
                    <div class="flex items-center space-x-6">
                        <div class="relative">
                            @if(Auth::user()->profile_photo)
                                <img src="{{ auth()->user()->profile_photo_path 
                                    ? asset('storage/' . auth()->user()->profile_photo_path)
                                    : asset('img/default-avatar.png') }}" 
                                    alt="Foto Profil" 
                                    class="w-20 h-20 rounded-2xl object-cover border-4 border-white shadow-lg">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3B82F6&color=fff&size=80" 
                                    alt="Foto Profil" 
                                    class="w-20 h-20 rounded-2xl object-cover border-4 border-white shadow-lg">
                            @endif
                            <div class="absolute -bottom-1 -right-1 p-1 bg-blue-500 rounded-lg">
                                <i class="fas fa-camera text-white text-xs"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <input type="file" 
                                   name="profile_photo" 
                                   accept="image/*" 
                                   class="block w-full text-sm text-gray-600 file:mr-4 file:py-3 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-gradient-to-r file:from-blue-50 file:to-cyan-50 file:text-blue-700 hover:file:from-blue-100 hover:file:to-cyan-100 cursor-pointer">
                            <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG. Maksimal 2MB</p>
                        </div>
                    </div>
                    @error('profile_photo')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Form Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            <i class="fas fa-user text-gray-500 mr-2"></i>Nama Penjual
                        </label>
                        <input type="text" 
                               name="name" 
                               value="{{ old('name', Auth::user()->name) }}"
                               class="w-full p-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-300 @error('name') border-red-300 bg-red-50 @enderror">
                        @error('name')
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            <i class="fas fa-store text-gray-500 mr-2"></i>Nama Toko
                        </label>
                        <input type="text" 
                               name="shop_name" 
                               value="{{ old('shop_name', Auth::user()->shop_name) }}"
                               class="w-full p-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-300 @error('shop_name') border-red-300 bg-red-50 @enderror">
                        @error('shop_name')
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fab fa-whatsapp text-gray-500 mr-2"></i>Nomor WhatsApp
                    </label>
                    <input type="text" 
                           name="whatsapp" 
                           value="{{ old('whatsapp', Auth::user()->whatsapp) }}"
                           placeholder="Contoh: 081234567890"
                           class="w-full p-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-300 @error('whatsapp') border-red-300 bg-red-50 @enderror">
                    @error('whatsapp')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        <i class="fas fa-map-marker-alt text-gray-500 mr-2"></i>Alamat Toko
                    </label>
                    <textarea name="address" 
                              rows="4"
                              placeholder="Masukkan alamat lengkap toko Anda..."
                              class="w-full p-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-300 @error('address') border-red-300 bg-red-50 @enderror">{{ old('address', Auth::user()->address) }}</textarea>
                    @error('address')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                            class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-bold py-3 px-8 rounded-xl transform transition-all duration-300 hover:scale-105 hover:shadow-lg flex items-center">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Side Panel -->
    <div class="space-y-6">
        <!-- Account Info Card -->
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl shadow-lg p-6 border border-green-100 transform transition-all duration-300 hover:shadow-xl">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-green-100 rounded-xl mr-3">
                    <i class="fas fa-info-circle text-green-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Info Akun</h3>
            </div>
            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Email:</span>
                    <span class="font-medium text-gray-800">{{ Auth::user()->email }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Bergabung:</span>
                    <span class="font-medium text-gray-800">{{ Auth::user()->created_at->format('d M Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Status:</span>
                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-lg text-xs font-medium">Aktif</span>
                </div>
            </div>
        </div>

        <!-- Danger Zone Card -->
        <div class="bg-gradient-to-r from-red-50 to-rose-50 rounded-2xl shadow-lg p-6 border border-red-100 transform transition-all duration-300 hover:shadow-xl">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-red-100 rounded-xl mr-3">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Zona Berbahaya</h3>
            </div>
            <p class="text-gray-600 text-sm mb-4">Tindakan ini tidak dapat dibatalkan. Pastikan Anda benar-benar yakin.</p>
            
            <form method="POST" action="{{ route('seller.destroy', Auth::id()) }}" id="deleteAccountForm" class="inline">
                @csrf
                @method('DELETE')
                
                <button type="button" 
                        class="w-full bg-gradient-to-r from-red-500 to-rose-500 hover:from-red-600 hover:to-rose-600 text-white font-bold py-3 px-4 rounded-xl transform transition-all duration-300 hover:scale-105 flex items-center justify-center"
                        onclick="confirmDeleteAccount()">
                    <i class="fas fa-trash-alt mr-2"></i>Hapus Akun
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
function confirmDeleteAccount() {
    Swal.fire({
        title: '⚠️ PERINGATAN BAHAYA!',
        html: `
            <div class="text-left">
                <p class="mb-3 text-gray-700">Apakah Anda yakin ingin menghapus akun ini?</p>
                <div class="bg-red-50 border border-red-200 rounded-lg p-3 mb-4">
                    <ul class="text-sm text-red-800 space-y-1">
                        <li>• Semua data toko akan hilang permanen</li>
                        <li>• Produk yang Anda jual akan dihapus</li>
                        <li>• Pesanan dan riwayat akan hilang</li>
                        <li>• Tindakan ini tidak dapat dibatalkan</li>
                    </ul>
                </div>
                <p class="text-sm text-gray-600">Ketik <strong class="text-red-600">HAPUS</strong> untuk melanjutkan:</p>
            </div>
        `,
        input: 'text',
        inputPlaceholder: 'Ketik HAPUS untuk konfirmasi',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Hapus Akun!',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        focusConfirm: false,
        preConfirm: (value) => {
            if (value !== 'HAPUS') {
                Swal.showValidationMessage('Ketik "HAPUS" untuk melanjutkan');
                return false;
            }
            return true;
        },
        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-xl font-bold',
            cancelButton: 'rounded-xl font-bold'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Menghapus Akun...',
                text: 'Mohon tunggu sebentar',
                icon: 'info',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Submit form
            document.getElementById('deleteAccountForm').submit();
        }
    });
}

// SweetAlert untuk success/error messages
@if(session('success'))
    Swal.fire({
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonColor: '#10b981',
        confirmButtonText: 'OK',
        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-xl font-bold'
        }
    });
@endif

@if(session('error'))
    Swal.fire({
        title: 'Oops!',
        text: '{{ session('error') }}',
        icon: 'error',
        confirmButtonColor: '#dc2626',
        confirmButtonText: 'OK',
        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-xl font-bold'
        }
    });
@endif
</script>
@endpush