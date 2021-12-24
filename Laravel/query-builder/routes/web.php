<?php

use App\Http\Controllers\AssignPermissionController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkspaceController;
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

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('organization')->name('organization.')->group(function(){
        Route::get('/list', [OrganizationController::class, 'index'])->name('index');
        Route::get('/show/{id}', [OrganizationController::class, 'show'])->name('show');
    });
    
    Route::prefix('workspace')->name('workspace.')->group(function(){
        Route::get('/list', [WorkspaceController::class, 'index'])->name('index');
        Route::get('/show/{id}', [WorkspaceController::class, 'show'])->name('show');
    });
    
    Route::prefix('role')->name('role.')->group(function(){
        Route::get('/list', [RoleController::class, 'index'])->name('index');
        Route::get('/show/{id}', [RoleController::class, 'show'])->name('show');
    });
    
    Route::prefix('project')->name('project.')->group(function(){
        Route::get('/list', [ProjectController::class, 'index'])->name('index');
        Route::get('/show/{id}', [ProjectController::class, 'show'])->name('show');
    });
    
    Route::prefix('task')->name('task.')->group(function(){
        Route::get('/list', [TaskController::class, 'index'])->name('index');
        Route::get('/show/{id}', [TaskController::class, 'show'])->name('show');
    });
    
    Route::prefix('users')->name('users.')->group(function(){
        Route::get('/list', [UserController::class, 'index'])->name('index');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
    });

});
