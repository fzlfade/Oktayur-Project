<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'deskripsi', 
        'harga',
        'stok',
        'kategori',
        'gambar',
        'user_id',
        'shop_id'
    ];
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}