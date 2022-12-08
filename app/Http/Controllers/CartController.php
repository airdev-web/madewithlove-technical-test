<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductToCartRequest;
use App\Http\Requests\RemoveProductFromCartRequest;
use App\Http\Requests\UpdateQuantityFromCartRequest;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {

    }

    public function add_product(AddProductToCartRequest $request)
    {
        $session_cart = session('cart', collect());

        // Find the related product in db
        $product = Product::find($request->id);
        $product->quantity = $request->quantity;

        // Test if product is already in cart, then update the quantity, else, create it in the cart session
        $product_already_in_cart = $session_cart->where('id', $product->id)->first();
        if ($product_already_in_cart)
            $product_already_in_cart->quantity += $product->quantity;
        else
            $session_cart->push($product);

        // Store in session the updated cart
        session(['cart' => $session_cart]);

        return redirect()->back();
    }

    public function remove_product(RemoveProductFromCartRequest $request)
    {
        $session_cart = session('cart', collect());

        // Update the session of the filtered cart without the removed product
        session(['cart' => $session_cart->filter(fn($product) => $product->id != $request->id)]);

        return redirect()->back();
    }

    public function update_quantity(UpdateQuantityFromCartRequest $request)
    {
        $session_cart = session('cart', collect());

        // Update the session with the updated quantity
        $session_cart->where('id', $request->id)->first()->quantity = $request->quantity;
        session(['cart' => $session_cart]);

        return redirect()->back();
    }
}
