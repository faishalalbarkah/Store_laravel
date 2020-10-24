<?php

use Illuminate\Support\Facades\Auth;
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
    Route::redirect('/','/home');
    Route::get('home', 'HomeController@index');
    Route::get('produk', 'ProdukController@index');
    Route::get('produk/detail/{id}', 'ProdukDetailController@index');
    Route::get('promotion', 'PromotionsController@index');
    Route::get('promotion-detail/{id}','PromotionDetailController@index');
});

Route::get('adminpanel/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('adminpanel/login','Auth\LoginController@login');
Route::post('adminpanel/logout','Auth\LoginController@logout')->name('logout');
Route::get('login',"Client\Auth\LoginController@login");
Route::get('register',"Client\Auth\LoginController@register");
Route::post('register', "Client\Auth\LoginController@registrasi");


Auth::routes();

Route::group(['prefix' => 'adminpanel','middleware' => 'auth', 'namespace' => 'Adminpanel'], function()
{
    Route::resource('produk', 'ProdukController');
    Route::resource('listorder', 'ListOrderController');
    Route::resource('promotion','PromotionController');
    Route::resource('voucher','VoucherController');
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
