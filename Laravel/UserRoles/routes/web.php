<?php

use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->name('role.')->group(function(){
    Route::get('/roles', [RoleController::class, 'index'])->name('index');
    Route::get('/role', [RoleController::class, 'create'])->name('create');
    Route::post('/role', [RoleController::class, 'store'])->name('store');
    Route::get('/role/{id}', [RoleController::class, 'destroy'])->name('delete');
});

Route::middleware('auth')->name('assign-role.')->group(function(){
    Route::get('/users', [AssignRoleController::class, 'index'])->name('index');
    Route::get('/assign-role', [AssignRoleController::class, 'create'])->name('create');
    Route::post('/assign-role', [AssignRoleController::class, 'store'])->name('store');
    Route::get('/assigned-role/{id}', [AssignRoleController::class, 'show'])->name('show');
});
