<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BukuKategoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HPromoController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\WishlistController;
use App\Models\Buku;
use App\Models\HPromo;
use App\Models\Kategori;
use App\Models\Wishlist;
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
    return redirect('home');
});

Route::get('/home', function(){
    return view('home',[
        'buku' => Buku::all(),
        'kategori' => Kategori::all(),
    ]);
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

Route::prefix('home')->group(function(){
    Route::get('/', [HomeController::class, 'homeAll']);
    Route::get('/promo', [HomeController::class, 'homePromo']);
    Route::post('/search', [HomeController::class, 'homeSearch']);
    Route::get('/{id}', [HomeController::class, 'homeKategori']);
});

Route::prefix('buku')->group(function(){
    Route::get('/{id}', [BukuController::class, 'detailBuku']);
    Route::get('/{id}/wishlist', [BukuController::class, 'wishBuku']);
    Route::get('/{id}/removeWishlist', [BukuController::class, 'removeWishBuku']);
});

Route::prefix('wishlist')->group(function(){
    Route::get('/', [WishlistController::class, 'showWishlist']);
});

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminViewController::class,'home']);
    Route::prefix('kategori')->group(function(){
        Route::get('/', [AdminViewController::class,'kategori']);
        Route::get('/add', [AdminViewController::class,'addKategori']);
        Route::post('/add-kategori', [KategoriController::class, 'store']);
        Route::get('/{id}/update', [AdminViewController::class, 'updateKategori']);
        Route::post('/{id}/update-kategori', [KategoriController::class, 'cekUpdate']);
        Route::get('/{id}/delete', [KategoriController::class, 'delete']);
    });

    Route::prefix('buku')->group(function(){
        Route::get('/', [AdminViewController::class,'buku']);
        Route::get('/add', [AdminViewController::class, 'addBuku']);
        Route::post('/add-buku', [BukuController::class, 'store']);
        Route::get('/{id}/kategori', [AdminViewController::class, 'kategoriBuku']);
        Route::post('/{id}/kategori-added', [BukuKategoriController::class, 'store']);
        Route::get('/{id}/update', [AdminViewController::class, 'updateBuku']);
        Route::post('/{id}/update-buku', [BukuController::class, 'cekUpdate']);
        Route::get('/{id}/delete', [BukuController::class, 'delete']);
    });

    Route::prefix('promo')->group(function(){
        Route::get('/', [AdminViewController::class,'promo']);
        Route::get('/add', [AdminViewController::class, 'addPromo']);
        Route::get('/{id}', [AdminViewController::class,'selectPromo']);
        Route::post('/add-promo', [HPromoController::class, 'store']);
        Route::get('/{id}/update', [AdminViewController::class, 'updatePromo']);
        Route::post('/{id}/update-promo', [HPromoController::class, 'cekUpdate']);
        Route::get('/{id}/delete', [HPromoController::class, 'deletePromo']);
    });
    Route::get('/bukti-transfer', [AdminViewController::class,'bukti_transfer']);
    Route::get('/pengantaran', [AdminViewController::class,'pengantaran']);
    Route::get('/retur', [AdminViewController::class,'retur']);
    Route::prefix('voucher')->group(function(){
        Route::get('/', [AdminViewController::class,'voucher']);
        Route::get('/add', [AdminViewController::class, 'addVoucher']);
        Route::get('/{id}', [AdminViewController::class,'selectVoucher']);
        Route::post('/add-voucher', [VoucherController::class, 'store']);
        Route::get('/{id}/update', [AdminViewController::class, 'updateVoucher']);
        Route::post('/{id}/update-voucher', [VoucherController::class, 'cekUpdate']);
        Route::get('/{id}/delete', [VoucherController::class, 'delete']);
    });
});
Route::post('/AddAlamat', [AlamatController::class,'prosesData']);
Route::get('/alamat', [AlamatController::class,'alamat']);
Route::get('/deletealamat', [AlamatController::class,'deletealamat']);
Route::post('/updatealamat', [AlamatController::class,'updatealamat']);
Route::get('tabledit', 'AlamatController@index');
Route::post('tabledit/action', 'AlamatController@action')->name('tabledit.action');
