<?php

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

Route::group(['namespace' => 'Client'], function () {
    Route::redirect('/', '/home')->name('/');
    Route::get('home', 'HomeController@index')->name('home')->middleware('guest');;
    Route::get('produk', 'ProdukController@index')->middleware('guest');;
    Route::get('produk/detail/{id}', 'ProdukDetailController@index')->middleware('guest');;
    Route::get('promotion', 'PromotionsController@index')->middleware('guest');;
    Route::get('promotion-detail/{id}', 'PromotionDetailController@index')->middleware('guest');;
});

Route::middleware('auth:customer')->group(function () {
    // Route::get('home', 'Client\HomeController@index')->name('customer.home');
    // Route::get('produk', 'Client\ProdukController@index')->name('customer.produk');
    // Route::get('promotion', 'Client\PromotionsController@index')->name('customer.promotion');
    Route::post('produk/cart/create/{id}', 'Client\ProdukDetail@addToCart');
    Route::get('produk/cart/{customer_id}', 'Client\CartController@cart');
    //Transaksi
});

Route::get('adminpanel/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('adminpanel/login', 'Auth\LoginController@login');
Route::post('adminpanel/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login', "Client\Auth\LoginController@login");
Route::post('loginuser', "Client\Auth\LoginController@loginakun")->name('loginuser');
// Route::post('logout', "Clien\Auth\LoginController@postLogout")->name('logout');
Route::get('register', "Client\Auth\LoginController@register");
Route::post('register', "Client\Auth\LoginController@registrasi");

Route::group(['prefix' => 'adminpanel', 'middleware' => 'auth', 'namespace' => 'Adminpanel'], function () {
    Route::resource('produk', 'ProdukController');
    Route::resource('listorder', 'ListOrderController');
    Route::resource('promotion', 'PromotionController');
    Route::resource('voucher', 'VoucherController');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
