<?php

use App\Http\Controllers\AssignPermissionController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/user-login',[LoginController::class,'login'])->name('user.login');
Route::post('/user-login',[LoginController::class,'authenticate'])->name('user.authenticate');
Route::get('/user-logout',[LoginController::class,'logout'])->name('user.logout');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
    Route::get('/admin',[HomeController::class,'admin'])->name('admin')->middleware('can:page,App\Models\User');;
});

Route::middleware('auth')->name('role.')->group(function(){
    Route::get('/roles', [RoleController::class, 'index'])->name('index');
    Route::post('/role', [RoleController::class, 'store'])->name('store');
    Route::get('/role/{id}', [RoleController::class, 'destroy'])->name('delete');
});

Route::middleware('auth')->name('assign-role.')->group(function(){
    Route::get('/assigned-users', [AssignRoleController::class, 'index'])->name('index');
    Route::get('/assign-role', [AssignRoleController::class, 'create'])->name('create');
    Route::post('/assign-role', [AssignRoleController::class, 'store'])->name('store');
    Route::get('/assigned-role/{id}', [AssignRoleController::class, 'edit'])->name('edit');
    Route::patch('/assigned-user/{id}', [AssignRoleController::class, 'update'])->name('update');
    Route::get('/assigned-user/{id}', [AssignRoleController::class, 'destroy'])->name('delete');
});

Route::middleware('auth')->group(function(){
    Route::get('/users',[UserController::class,'index'])->name('user.index');
    Route::get('/user',[UserController::class,'create'])->name('user.create');
    Route::post('/user',[UserController::class,'store'])->name('user.store');
    Route::get('/user/{id}',[UserController::class,'destroy'])->name('user.delete');
});

Route::middleware('auth')->name('assign-permission.')->group(function(){
    Route::get('/assigned-permissions', [AssignPermissionController::class, 'index'])->name('index');
    Route::get('/assigned/{id}', [AssignPermissionController::class, 'edit'])->name('edit');
    Route::get('/assign-permission', [AssignPermissionController::class, 'create'])->name('create');
    Route::post('/assign-permission', [AssignPermissionController::class, 'store'])->name('store');
    Route::patch('/assigned-permissions/{id}', [AssignPermissionController::class, 'update'])->name('update');
    Route::get('/assigned-permission/{id}', [AssignPermissionController::class, 'destroy'])->name('delete');
});