<?php

use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('user')->name('user.')->middleware('auth')->group(function(){
    Route::get('/list', [UserController::class, 'index'])->name('index');
    Route::get('/', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit')->middleware('can:edit, App\Models\User');
    Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
});

Route::prefix('organization')->name('organization.')->middleware('auth')->group(function(){
    Route::get('/list', [OrganizationController::class, 'index'])->name('index');
    Route::get('/', [OrganizationController::class, 'create'])->name('create');
    Route::post('/', [OrganizationController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [OrganizationController::class, 'edit'])->name('edit')->middleware('can:organizationEdit, App\Models\RolePermission');
    Route::patch('/update/{id}', [OrganizationController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [OrganizationController::class, 'destroy'])->name('delete')->middleware('can:organizationDelete, App\Models\RolePermission');
});

Route::prefix('assign-role')->name('assign-role.')->middleware('auth')->group(function(){
    Route::get('/list', [AssignRoleController::class, 'index'])->name('index');
    Route::get('/', [AssignRoleController::class, 'create'])->name('create');
    Route::post('/', [AssignRoleController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AssignRoleController::class, 'edit'])->name('edit')->middleware('can:rolesEdit','App\Models\RolePermission');
    Route::patch('/update/{id}', [AssignRoleController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [AssignRoleController::class, 'destroy'])->name('delete');//->middleware('can:rolesDelete','App\Models\RolePermission');
});

/* Route::prefix('assign-permission')->name('assign-permission.')->middleware('auth')->group(function(){
    Route::get('/list', [RolePermissionController::class, 'index'])->name('index');
    Route::get('/', [RolePermissionController::class, 'create'])->name('create');
    Route::post('/', [RolePermissionController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [RolePermissionController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [RolePermissionController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [RolePermissionController::class, 'destroy'])->name('delete');
}); */


