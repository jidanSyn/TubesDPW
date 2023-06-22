<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminGameController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminRankingController;

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

Route::get('/product/{game}', [ProductController::class, 'index'])->name('product');


Route::get('/login', function () {
    return view('login');
});

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/register', [LoginController::class, 'create']);
Route::post('/logout', [LoginController::class, 'logout']);
    
Route::resource('/product/transaction', TransactionController::class);

Route::get('/admin', [AdminController::class, 'view']);

Route::get('/admin/users', [AdminUserController::class, 'index']);

Route::resource('/admin/games', AdminGameController::class);
Route::resource('/admin/games/products', AdminProductController::class);

Route::get('/about', [AboutController::class, 'view']);

// Route::get('/', [GameController::class, 'frequentlyPurchased']);

Route::get('/admin/users/{user:id}', [AdminUserController::class, 'updateIsAdmin'])->name('isAdmin');

Route::get('/admin/rankings/games', [AdminRankingController::class, 'games']);
Route::get('/admin/rankings/products', [AdminRankingController::class, 'products']);
Route::get('/admin/transactions', [AdminController::class, 'viewTransactions']);





