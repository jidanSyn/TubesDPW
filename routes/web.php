<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminGameController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [GameController::class, 'index']);


Route::get('/product', [ProductController::class, 'showProducts']);

Route::get('/product/{game}', [ProductController::class, 'index'])->name('produk');


Route::get('/login', function () {
    return view('login');
});

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/register', [LoginController::class, 'create']);
Route::post('/logout', [LoginController::class, 'logout']);
    

Route::get('/admin', [AdminController::class, 'view']);


Route::resource('/admin/games', AdminGameController::class);

Route::resource('/admin/games/products', AdminProductController::class);

