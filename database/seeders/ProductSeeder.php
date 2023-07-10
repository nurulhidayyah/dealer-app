<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'category_id' => rand(1, 3),
                'nama_barang' => 'Lorem Ipsum Dolor Sit Amet',
                'harga' => rand(1000, 100000),
                'gambar' => 'shop_image_' . $i . '.jpg',
                'deskripsi' => 'Lorem Ipsum Dolor Sit Amet'
            ]);
        }
    }
}
