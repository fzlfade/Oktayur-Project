<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $products = [
      ['name'=>'Tomat','slug'=>'tomat','image'=>'tomat.jpeg','price'=>17300],
      ['name'=>'Cabai','slug'=>'cabai','image'=>'cabai.jpeg','price'=>47500],
      // … lainnya …
    ];
    foreach($products as $p) {
      \App\Models\Product::create($p);
    }
}

}
