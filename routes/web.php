<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/categories', 'App\Http\Controllers\HomeController@categoriesMain')->name('categories.main');
Route::get('/category-show/{alias}', 'App\Http\Controllers\HomeController@categoryShow')->name('category.show');


Route::resource('/products', ProductController::class);

Route::prefix('admin')->middleware('auth')->middleware('is_admin')->group(function () {
    Route::get('/', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.home');
    Route::resource('/orders', OrderController::class);
    Route::resource('/categories', CategoryController::class);
});


Route::get('/cart', 'App\Http\Controllers\CartController@cart')->name('cart');
Route::get('/cart/order', 'App\Http\Controllers\CartController@cartOrder')->name('cart.order');
Route::post('/cart/confirm', 'App\Http\Controllers\CartController@cartConfirm')->name('cart.confirm');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@addToCart')->name('add.to.cart');
Route::post('/cart/remove/{id}', 'App\Http\Controllers\CartController@removeFromCart')->name('remove.from.cart');

require __DIR__ . '/auth.php';
