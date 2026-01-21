<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\MypageController;


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

Route::get('/', [ProductController::class, 'index'])
    ->middleware('profile.completed')
    ->name('home');

Route::get('/item/{id}', [ProductController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/mypage/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/mypage/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/mypage', function() {
        return view('mypage');
    });

    Route::get('/sell', [ProductController::class, 'create']);
    Route::post('/sell', [ProductController::class, 'store']);

    Route::post('/like/{product}', [LikeController::class, 'toggle'])->middleware('auth');

    Route::post('/comment/{product}', [CommentController::class, 'store']);
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy']);

    Route::get('/purchase/{item}', [PurchaseController::class, 'show']);
    Route::post('/purchase/{item}', [PurchaseController::class, 'store']);

    Route::get('/purchase/address/{item}', [AddressController::class, 'edit']);
    Route::post('/purchase/address/{item}', [AddressController::class, 'update']);

    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage.index');
});
