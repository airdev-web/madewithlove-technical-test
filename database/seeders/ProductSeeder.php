<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $json_products = collect(json_decode(file_get_contents(resource_path('data/products.json')), true));
        $json_products->each(fn($product) => Product::create($product));
    }
}
