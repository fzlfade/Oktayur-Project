<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    // SellerController.php
    public function edit(User $user)
    {
        return view('sellers.settings', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'shop_name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:15',
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
        ]);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo_path) {
                Storage::delete($user->profile_photo_path);
            }
            
            // Store new photo
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
}
