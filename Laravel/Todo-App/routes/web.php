<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return view('welcome');
});

Route::get('/dashboard', [TaskController::class,'create'])->name('dashboard')->middleware(['auth:sanctum', 'verified']);
Route::post('/task', [TaskController::class,'store'])->name('store')->middleware(['auth:sanctum', 'verified']);
Route::get('/tasks', [TaskController::class,'index'])->name('tasks')->middleware(['auth:sanctum', 'verified']);
Route::get('/delete/{id}', [TaskController::class,'destroy'])->name('destroy')->middleware(['auth:sanctum', 'verified']);