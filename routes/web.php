<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardAdminController;
use App\Models\Products;

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

Route::get('/', function () {
    return view('index');
})->name('login')->middleware('guest');

Route::get('/register', [UserController::class, 'register']);
Route::post('/registered', [UserController::class, 'registered']);

Route::post('/login', [UserController::class, 'authenticate']);


Route::resource('/dashboard', DashboardAdminController::class)->middleware('auth');

// Logout
Route::post('/logout', [UserController::class, 'logout']);

Route::resource('/produk', ProductsController::class)->middleware('auth');

Route::resource('/transaksi', TransaksiController::class)->middleware('auth');

Route::get('getProduk/{id}', function ($id) {
    $nama_produk = Products::where('id', $id)->get();
    return response()->json($nama_produk);
});

Route::get('getProduk2/{id}', function ($id) {
    $harga = Products::where('id', $id)->get();
    return response()->json($harga);
});
