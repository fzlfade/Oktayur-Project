<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Auth::user()->products()->latest()->paginate(10);
        return view('products.index', compact('products'));
    }
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
            $path = $request->file('gambar')->store('products', 'public'); 
            $validated['gambar'] = $path;
        }

        $validated['user_id'] = Auth::id();

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

 

    public function destroy(Product $product)
    {
    if ($product->user_id !== Auth::id()) {
        abort(403);
    }

    if ($product->gambar) {
        Storage::disk('public')->delete($product->gambar);
    }
    
    $product->delete();

    return redirect()->route('products.index')
                     ->with('success', 'Produk berhasil dihapus!');
    }

    public function edit(Product $product)
    {
    return view('products.edit', compact('product'));
    }

public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'nama_produk' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
        'kategori' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }
        
        $path = $request->file('gambar')->store('products', 'public'); 
        $validated['gambar'] = $path;   
    }

    $product->update($validated);

    return redirect()->route('products.index')
                     ->with('success', 'Produk berhasil diperbarui!');
}
}