<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth','profile.completed'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/mypage/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/mypage/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/item/{id}', function($id) {
    return view('item');
    });
    Route::get('/mypage', function() {
        return view('mypage');
    });
    Route::get('/sell', [ProductController::class, 'create']);
    Route::post('/sell', [ProductController::class, 'store']);
});
