<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori' => 'required|in:Sayuran,Buah,Umbi', // Sesuaikan dengan kategori yang tersedia
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/products');
            $validated['gambar'] = Storage::url($path);
        }

        $validated['user_id'] = Auth::id();

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function index()
    {
        $products = Auth::user()->products()->latest()->paginate(10);
        return view('products.index', compact('products'));
    } 

    public function destroy(Product $product)
    {
    // Ensure the user owns the product
    if ($product->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    // Delete the product
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}