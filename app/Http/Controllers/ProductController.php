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
        $products = Auth::user()->products()->latest()->paginate(5);
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
            'kategori' => 'required|in:Sayuran,Buah,Umbi', 
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

    public function customerShow(Product $product)
    {
        $seller = $product->user;
        
        return view('products.customer_show', compact('product', 'seller'));
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

public function customerIndex(Request $request)
{
    // Ambil parameter filter dari request
    $filters = [
        'search' => $request->input('search'),
        'categories' => $request->input('categories', []),
        'min_price' => $request->input('min_price', 0),
        'max_price' => $request->input('max_price', 1000000),
        'sort' => $request->input('sort', 'popular'),
        'conditions' => $request->input('conditions', []),
    ];

    // Query dasar
    $query = Product::query();

    // Filter pencarian
    if ($filters['search']) {
        $query->where('nama_produk', 'like', '%'.$filters['search'].'%');
    }

    // Filter kategori
    if (!empty($filters['categories'])) {
        $query->whereIn('kategori', $filters['categories']);
    }

    // Filter harga
    $query->whereBetween('harga', [
        $filters['min_price'], 
        $filters['max_price']
    ]);

    // Filter kondisi
    if (in_array('organic', $filters['conditions'])) {
        $query->where('is_organic', true);
    }
    if (in_array('fresh', $filters['conditions'])) {
        $query->where('is_fresh', true);
    }

    // Sorting
    switch ($filters['sort']) {
        case 'low_price':
            $query->orderBy('harga');
            break;
        case 'high_price':
            $query->orderByDesc('harga');
            break;
        case 'rating':
            $query->orderByDesc('rating');
            break;
        case 'newest':
            $query->orderByDesc('created_at');
            break;
        default:
            $query->orderByDesc('created_at');
    }

    // Paginasi
    $products = $query->paginate(12);

    // Kategori unik untuk filter
    $categories = Product::distinct()->pluck('kategori');

    return view('products.customer_index', compact('products', 'filters', 'categories'));
}
}