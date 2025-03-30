<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class PenjualController extends Controller
{
    public function dashboard()
    {
        $barangs = Barang::all(); // Ambil semua barang yang ada
        return view('penjual.dashboard', compact('barangs'));
    }
}
