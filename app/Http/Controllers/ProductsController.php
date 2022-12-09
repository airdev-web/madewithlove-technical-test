<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
    }

    public function removed_products()
    {
        $removed_product_ids = OrderProduct::where('removed', true)->groupBy('product_id')->get('product_id')->pluck('product_id');

        $products = Product::with(['order_products' => function($query) {
            $query->where('removed', true);
        }, 'order_products.order'])->whereIn('id', $removed_product_ids)->get();

        return view('admin.products.removed', ['products' => $products]);
    }
}
