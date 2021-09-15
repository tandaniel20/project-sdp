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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});



Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::prefix('admin')->group(function(){
    Route::get('/home', function () {return view('admin-home',[
        'title' => "Home"
    ]);});
    Route::get('/kategori', function () {return view('admin-kategori',[
        'title' => "Kategori"
    ]);});
    Route::get('/buku', function () {return view('admin-buku',[
        'title' => "Buku"
    ]);});
    Route::get('/promo', function () {return view('admin-promo',[
        'title' => "Promo"
    ]);});
    Route::get('/bukti-transfer', function () {return view('admin-bukti-transfer',[
        'title' => "Bukti Transfer"
    ]);});
    Route::get('/pengantaran', function () {return view('admin-pengantaran',[
        'title' => "Pengantaran"
    ]);});
    Route::get('/retur', function () {return view('admin-retur',[
        'title' => "Retur"
    ]);});
    Route::get('/voucher', function () {return view('admin-voucher',[
        'title' => "Manajemen Kode Voucher"
    ]);});
});
