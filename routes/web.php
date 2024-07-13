<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\MinumanController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\DineInController;
use App\Http\Controllers\TransaksiController;
use App\Http\Middleware\IsSuperAdmin;
use App\Http\Middleware\IsAdmin;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');;
// Route::resource('anggota', AnggotaController::class)->middleware('auth');;
// Route::resource('kategori', KategoriController::class)->middleware('auth');;

Route::middleware(['auth', 'verified'])->group(function () {
    //dapat diakses oleh IsSuperAdmin dan IsAdmin
    Route::get('home', [HomeController::class, 'index'])->name('home');
    
    // Route::resource('promo', PromoController::class);
    Route::get('/get-user/{id}', [CustomerController::class, 'getUser']);
    // Route::get('/get-promo/{id}', [PromoController::class, 'getPromo']);
    Route::get('/get-customer/{id}', [CustomerController::class, 'getCustomer']);
    Route::resource('user', UserController::class);
    Route::resource('makanan', MakananController::class);
    Route::resource('minuman', MinumanController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('promo', PromoController::class);
    Route::resource('dinein', DineInController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('customer', CustomerController::class);
    Route::get('/unduh-pdf', [TransaksiController::class, 'unduhPDF']);
    Route::middleware([IsSuperAdmin::class])->group(function () {
        //sidebar yang diakses IsSuperAdmin
        
    });
    Route::middleware([IsAdmin::class])->group(function () {
        //sidebar yang diakses IsAdmin

    });
});