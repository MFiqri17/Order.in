<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Livewire\CartCreate;
use App\Http\Livewire\ShowMenu;
use App\Http\Livewire\ShowMenu2;
use App\Http\Livewire\CartList;

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

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/menu/add', [AdminController::class, 'add_menu']);
    Route::post('/admin/menu/store', [AdminController::class, 'store_menu']);
    Route::get('/admin/menu/edit/{menu}', [AdminController::class, 'edit_menu']);
    Route::post('/admin/menu/update/{menu}', [AdminController::class, 'update_menu'])->name('update-menu');
    Route::get('/admin/menu/delete/{menu}', [AdminController::class, 'delete_menu'])->name('delete-menu');
});
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    // Admin Menu Section
    Route::get('/admin/menu', [AdminController::class, 'view_menu']);

<<<<<<< HEAD
    // Admin Info Section
    Route::get('/admin/info-restaurant/{restoran}', [AdminController::class, 'view_info']);
    Route::post('/admin/info-restaurant/update/{restoran}', [AdminController::class, 'update_info'])->name('update-info');

    // Admin Sales Section
    Route::get('/admin/sales', [AdminController::class, 'view_sales']);

    // Admin Payment
    Route::get('/admin/payment', [AdminController::class, 'view_payment']);
});
=======
>>>>>>> ba9ca70d04520bf96976373347a6242f41ca1bd6
Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login', [LoginController::class, 'authenticate']);
Route::get('/admin/register', [LoginController::class, 'index_register']);
Route::post('/admin/register', [LoginController::class, 'register']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');
// bagian Mitsal
// Landing Page
Route::get('/{meja}', [PesananController::class, 'index']);

// bagian Fiqri
// Menu
Route::get('/{meja}/menu', [MenuController::class, "index"])->name('menu');
// Route::post('/{meja}/menu', ShowMenu::class)->name('addToCart');
Route::get('/{meja}/detail/{menu}', [PesananController::class, "detail"])->name('detail');
Route::post('/{meja}/detail/{menu}', [PesananController::class, "pesan"])->name('pesan');

// Bagian Hardhika
// Menu dengan Cart


/// Bagian Aji
// Detail Pesanan
Route::get('/{meja}/detailPesanan', [MenuController::class, "cartList"])->name('detailPesanan');
// bagian RB
// Detail Menu
Route::get('/detail', function () {
    return view('detail');
});

// Invoice Pesanan
Route::get('/invoice', function () {
    return view('invoice');
});
