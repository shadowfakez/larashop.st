<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CartNotEmpty;
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

Route::get('locale/{locale}', 'App\Http\Controllers\HomeController@changeLocale')->name('locale');
Route::get('currency/{currencyCode}', 'App\Http\Controllers\HomeController@changeCurrency')->name('currency');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('dashboard')->middleware('auth');

Route::post('/subscription/{product}', 'App\Http\Controllers\HomeController@subscribe')->name('subscription');

Route::get('/categories', 'App\Http\Controllers\CategoryController@categoriesMain')->name('categories.main');
Route::get('/category-show/{alias}', 'App\Http\Controllers\CategoryController@categoryShow')->name('category.show');


Route::resource('/products', ProductController::class)->only('index', 'show');

Route::prefix('admin')->name('admin.')->middleware('auth')->middleware('is_admin')->group(function () {
    Route::get('/', 'App\Http\Controllers\Admin\AdminController@index')->name('home');
    Route::resource('/orders', OrderController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', App\Http\Controllers\Admin\ProductController::class);
});

Route::resource('/order', App\Http\Controllers\User\OrderController::class)->only('show');

Route::prefix('cart')->group(function () {
    Route::post('/add/{product}', 'App\Http\Controllers\CartController@addToCart')->name('add.to.cart');
    Route::middleware(CartNotEmpty::class)->group(function () {
        Route::get('/', 'App\Http\Controllers\CartController@cart')->name('cart');
        Route::get('/order', 'App\Http\Controllers\CartController@cartOrder')->name('cart.order');
        Route::post('/confirm', 'App\Http\Controllers\CartController@cartConfirm')->name('cart.confirm');
        Route::post('/remove/{product}', 'App\Http\Controllers\CartController@removeFromCart')->name('remove.from.cart');
    });
});


require __DIR__ . '/auth.php';
