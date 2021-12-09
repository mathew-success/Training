<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\JobController;
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
    return redirect('login');
});

Route::middleware(['auth'])->get('/dashboard', function () {
    if(auth()->user()->role === 'admin'){
        return view('dashboard');
    }
    if(auth()->user()->role === 'employer'){
        return view('employerDashboard');
    }
    return view('userDashboard');
})->name('dashboard');

Route::middleware(['auth','adminrole'])->group(function(){
    Route::get('companies', [CompanyController::class, 'index'])->name('company.index');
    Route::get('company', [CompanyController::class, 'create'])->name('company.create');
    Route::post('company', [CompanyController::class, 'store'])->name('company.store');
    Route::patch('company/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::get('company/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
});

Route::middleware(['auth:sanctum','employerrole'])->group(function(){
    Route::get('jobs', [JobController::class, 'index'])->name('job.index');
    Route::get('job', [JobController::class, 'create'])->name('job.create');
    Route::post('job', [JobController::class, 'store'])->name('job.store');
    Route::get('job/{id}', [JobController::class, 'destroy'])->name('job.destroy');
    Route::get('job-users', [JobController::class, 'appliedusers'])->name('job.users');
    Route::get('job-users-info/{id}', [JobController::class, 'applied_user_info'])->name('job.usersinfo');
});

Route::middleware(['auth:sanctum','userrole'])->group(function(){
    Route::get('jobs-list', [UserController::class, 'jobs'])->name('user.jobs');
    Route::get('apply-jobs/{id}', [JobApplyController::class, 'show'])->name('user.apply'); 
    Route::post('apply', [JobApplyController::class, 'store'])->name('userjob.store');
    Route::get('appliedjobs', [JobApplyController::class, 'appliedjobs'])->name('user.appliedjobs');
});