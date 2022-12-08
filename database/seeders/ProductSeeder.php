<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Read the sample product json file and fill it in db
        $json_products = collect(json_decode(file_get_contents(resource_path('data/products.json')), true));
        $json_products->each(fn($product) => Product::create($product));
    }
}
