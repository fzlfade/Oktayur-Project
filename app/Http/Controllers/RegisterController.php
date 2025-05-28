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
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'whatsapp' => 'required|string|max:15',
            'address',

        ]);

        $user = User::create([
            'name' => $request->shop_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'shop_name' => $request->shop_name,
            'whatsapp' => $request->whatsapp,
            'address' => $request->address ?? 'Alamat belum diisi',
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}