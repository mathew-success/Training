<?php

use App\Http\Controllers\PostController;
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

Route::group(['middleware'=>['auth:sanctum', 'verified']],function(){
    Route::get('/', [PostController::class, 'allposts'])->name('allposts');
    Route::get('/dashboard', [PostController::class, 'create'])->name('dashboard');
    Route::get('/posts', [PostController::class, 'index'])->name('index');
    Route::post('/posts', [PostController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('delete');
    Route::get('/post/{id}', [PostController::class, 'show'])->name('show');
});