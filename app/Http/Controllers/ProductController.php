<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1) Tampilkan semua produk
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // 2) Tampilkan detail per produk
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }

    // 3) Redirect ke WhatsApp
    public function checkout($id)
    {
        $product = Product::findOrFail($id);
        // nomor WA penjual simpan di .env atau config/app.php
        $wa = env('SELLER_WHATSAPP', '628123456789');
        $text = urlencode("Saya mau beli {$product->name} seharga Rp" . number_format($product->price,0,',','.') . "/Kg");
        $url = "https://wa.me/{$wa}?text={$text}";
        return redirect()->away($url);
    }
}
