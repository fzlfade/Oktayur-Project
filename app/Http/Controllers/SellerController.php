<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    public function edit(User $user)
    {
        return view('sellers.settings', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Sanitasi nomor WhatsApp sebelum validasi
        $cleaned = $this->sanitizeWhatsapp($request->input('whatsapp'));

        // Jika nomor WhatsApp sudah dalam format yang benar, update request
        if ($cleaned) {
            $request->merge(['whatsapp' => $cleaned]);
        }

        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'shop_name' => 'required|string|max:255',
        'whatsapp' => [
            'required',
            'string',
            'max:15',
            'regex:/^\+[1-9]\d{1,14}$/' // Format internasional (E.164)
        ],
        'address' => 'required|string|max:500',
        'profile_photo' => [
            'nullable',
            'image',
            'mimes:jpeg,png,jpg',
            'max:2048',
        ],
    ], [
        'profile_photo.image' => 'File harus berupa gambar (jpeg/png/jpg)',
        'profile_photo.mimes' => 'Format file harus: jpeg, png, jpg',
        'profile_photo.max' => 'Ukuran maksimal 2MB',
        'whatsapp.regex' => 'Format nomor WhatsApp tidak valid. Gunakan format internasional dengan kode negara (contoh: +628123456789)'
    ]);

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_path) {
                Storage::delete($user->profile_photo_path);
            }
            
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $validated['profile_photo_path'] = $path;
        }

    $user->update($validated);

    return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
}

    public function destroy(User $user)
    {
        Auth::logout();
        $user->delete();
        return redirect('/')->with('success', 'Akun berhasil dihapus!');
    }

    private function sanitizeWhatsapp($number)
    {
        // Hapus semua karakter non-digit kecuali tanda +
        $cleaned = preg_replace('/[^0-9+]/', '', $number);
        
        // Jika sudah ada tanda + di depan, langsung kembalikan
        if (strpos($cleaned, '+') === 0) {
            return $cleaned;
        }
        
        // Handle khusus untuk format Indonesia (08xxx -> +628xxx)
        if (preg_match('/^0?8(\d{8,})$/', $cleaned, $matches)) {
            return '+628' . $matches[1];
        }
        
        // Handle khusus untuk format Indonesia (628xxx -> +628xxx)
        if (preg_match('/^62(\d{9,})$/', $cleaned)) {
            return '+' . $cleaned;
        }
        
        // Untuk format lainnya, tambahkan + jika belum ada
        if (strpos($cleaned, '+') !== 0) {
            $cleaned = '+' . ltrim($cleaned, '0');
        }
        
        return $cleaned;
    }
}
