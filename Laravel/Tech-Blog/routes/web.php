<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogTechnologyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobEnquiryController;
use App\Http\Controllers\JobTechnologyController;
use App\Http\Controllers\TechnologyController;
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

Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('/', [BlogTechnologyController::class, 'allposts'])->name('front.allposts');
    Route::get('/front/{id}', [BlogTechnologyController::class, 'show'])->name('front.show');
    Route::get('/job_apply', [JobEnquiryController::class, 'applyjob'])->name('job.apply');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('blogs', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
});

Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('technologies', [TechnologyController::class, 'index'])->name('technology.index');
    Route::get('technology', [TechnologyController::class, 'create'])->name('technology.create');
    Route::post('technology', [TechnologyController::class, 'store'])->name('technology.store');
    Route::get('technology/{id}', [TechnologyController::class, 'destroy'])->name('technology.destroy');
});

Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('blog_techs', [BlogTechnologyController::class, 'index'])->name('blog_tech.index');
    Route::get('blog_tech', [BlogTechnologyController::class, 'create'])->name('blog_tech.create');
    Route::post('blog_tech', [BlogTechnologyController::class, 'store'])->name('blog_tech.store');
    Route::get('blog_tech/{id}', [BlogTechnologyController::class, 'destroy'])->name('blog_tech.destroy');
});

Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('countries', [CountryController::class, 'index'])->name('country.index');
    Route::get('country', [CountryController::class, 'create'])->name('country.create');
    Route::post('country', [CountryController::class, 'store'])->name('country.store');
    Route::get('country/{id}', [CountryController::class, 'destroy'])->name('country.destroy');
});

Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('jobs', [JobController::class, 'index'])->name('job.index');
    Route::get('job', [JobController::class, 'create'])->name('job.create');
    Route::post('job', [JobController::class, 'store'])->name('job.store');
    Route::get('job/{id}', [JobController::class, 'destroy'])->name('job.destroy');
});

Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('job_techs', [JobTechnologyController::class, 'index'])->name('job_tech.index');
    Route::get('job_tech', [JobTechnologyController::class, 'create'])->name('job_tech.create');
    Route::post('job_tech', [JobTechnologyController::class, 'store'])->name('job_tech.store');
    Route::get('job_tech/{id}', [JobTechnologyController::class, 'destroy'])->name('job_tech.destroy');
});

Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('job_enquiries', [JobEnquiryController::class, 'index'])->name('job_enquiry.index');
    Route::get('job_enquiry', [JobEnquiryController::class, 'create'])->name('job_enquiry.create');
    Route::post('job_enquiry', [JobEnquiryController::class, 'store'])->name('job_enquiry.store');
    Route::get('job_enquiry/{id}', [JobEnquiryController::class, 'destroy'])->name('job_enquiry.destroy');
});

Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('/user', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
});