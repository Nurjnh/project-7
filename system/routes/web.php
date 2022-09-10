<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceprovider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/tamplate', function () {
    return view('tamplate.base');
});

Route::get('/base', function () {
    return view('admin.base');
});


Route::get('/beranda', [HomeController::class, 'showBeranda']);
Route::get('/kategori', [HomeController::class, 'showKategori']);


Route::get('/Promo', function () {
    return view('admin.section.Promo');
});

Route::get('/pelanggan', function () {
    return view('admin.section.pelanggan');
});

Route::get('/supplier', function () {
    return view('admin.section.supplier');
});

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::post('produk/filter', [ProdukController::class,'filter']);
    Route::resource('produk', ProdukController::class);
    Route::resource('user', UserController::class);
});

Route::get('login_admin', [AuthController::class, 'showlogin_admin'])->name('login_admin');
Route::post('login_admin', [AuthController::class, 'login_adminProcess']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('test/{produk}/{hargaMin?}/{hargaMax?}',[HomeController::class,'test']);




