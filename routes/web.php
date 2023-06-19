<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
});

Route::get('/produk', function () {
    return view('produk');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/register', [LoginController::class, 'create']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/admin', function() {

// });