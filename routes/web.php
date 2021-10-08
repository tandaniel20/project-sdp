<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Models\Kategori;
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

Route::post('/register-user', [UserController::class,'create']);
Route::post('/login-user', [UserController::class,'checkLogin']);
Route::get('/logout-user', [UserController::class,'logOut']);
Route::get('/logout-admin', [UserController::class,'logOut']);

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminViewController::class,'home']);
    Route::prefix('kategori')->group(function(){
        Route::get('/', [AdminViewController::class,'kategori']);
        Route::get('/add', [AdminViewController::class,'addKategori']);
        Route::post('/add-kategori', [KategoriController::class, 'store']);
        Route::get('/{id}/update', [AdminViewController::class, 'updateKategori']);
        Route::post('/{id}/update-kategori', [KategoriController::class, 'cekUpdate']);
    });

    Route::prefix('buku')->group(function(){
        Route::get('/', [AdminViewController::class,'buku']);
        Route::get('/add', [AdminViewController::class, 'addBuku']);
        Route::post('/add-buku', [BukuController::class, 'store']);
    });
    Route::get('/buku', [AdminViewController::class,'buku']);
    Route::get('/promo', [AdminViewController::class,'promo']);
    Route::get('/bukti-transfer', [AdminViewController::class,'bukti_transfer']);
    Route::get('/pengantaran', [AdminViewController::class,'pengantaran']);
    Route::get('/retur', [AdminViewController::class,'retur']);
    Route::prefix('voucher')->group(function(){
        Route::get('/', [AdminViewController::class,'voucher']);
        Route::get('/add', [AdminViewController::class, 'addVoucher']);
        Route::get('/{id}', [AdminViewController::class,'selectVoucher']);
        Route::post('/add-voucher', [VoucherController::class, 'store']);
    });
});
