<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\UserController;
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

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminViewController::class,'home']);
    Route::get('/kategori', [AdminViewController::class,'kategori']);
    Route::get('/buku', [AdminViewController::class,'buku']);
    Route::get('/promo', [AdminViewController::class,'promo']);
    Route::get('/bukti-transfer', [AdminViewController::class,'bukti_transfer']);
    Route::get('/pengantaran', [AdminViewController::class,'pengantaran']);
    Route::get('/retur', [AdminViewController::class,'retur']);
    Route::get('/voucher', [AdminViewController::class,'voucher']);
});
