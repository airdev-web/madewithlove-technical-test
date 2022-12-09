<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductToCartRequest;
use App\Http\Requests\RemoveProductFromCartRequest;
use App\Http\Requests\UpdateQuantityFromCartRequest;
use App\Models\Order;
use App\Models\OrderProduct;
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

        // Set attribute the product has been removed from cart
        $session_cart->where('id', $request->id)->first()->removed = true;
        session(['cart' => $session_cart]);

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

    public function order()
    {
        $session_cart = session('cart', collect());

        // Create the order
        $order = new Order();
        $order->save();

        // Convert the session to array attribute with only what's needed
        $session_cart = $session_cart->map(fn($product) => [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $product->quantity,
            'removed' => false,
            'product_id' => $product->id,
            'order_id' => $order->id
        ]);

        // Bulk insert for performance of all the products
        OrderProduct::insert($session_cart->toArray());

        // The order is saved, reset the session cart
        session()->forget('cart');

        return redirect(route('home'));
    }
}
