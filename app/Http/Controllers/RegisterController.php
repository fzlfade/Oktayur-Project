<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Sanitasi nomor WhatsApp sebelum validasi
        $sanitizedWhatsapp = $this->sanitizeWhatsapp($request->input('whatsapp'));
        $request->merge(['whatsapp' => $sanitizedWhatsapp]);

        $request->validate([
            'shop_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'whatsapp' => [
                'required',
                'string',
                'max:16', // Diperbesar menjadi 16 karakter
                'regex:/^\+[1-9]\d{1,14}$/' // Format E.164
            ],
            'address',
        ], [
            'whatsapp.regex' => 'Format nomor WhatsApp tidak valid. Gunakan format internasional dengan kode negara (contoh: +628123456789)'
        ]);

        $user = User::create([
            'name' => $request->shop_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'shop_name' => $request->shop_name,
            'whatsapp' => $sanitizedWhatsapp,
            'address' => $request->address ?? 'Alamat belum diisi',
        ]);

        Auth::login($user);

        return redirect('/dashboard');
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