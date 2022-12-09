<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn() => redirect(route('products.index')))->name('home');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::post('/add_to_cart', [CartController::class, 'add_product'])->name('cart.add_product');
Route::delete('/remove_from_cart', [CartController::class, 'remove_product'])->name('cart.remove_product');
Route::patch('/update_quantity', [CartController::class, 'update_quantity'])->name('cart.update_quantity');
Route::get('/order', [CartController::class, 'order'])->name('cart.order');

Route::get('/admin/products/removed', [ProductsController::class, 'removed_products'])->name('admin.products.removed');
