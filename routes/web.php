<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboadController;
use App\Http\Controllers\AwsS3;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AwsS3::class, 'index'])->name('dashboard');
    Route::post('/upload', [AwsS3::class, 'upload'])->name('upload');
    Route::post('/delete', [AwsS3::class, 'destroy'])->name('destroy');
    Route::post('/privacity', [AwsS3::class, 'privacity'])->name('privacity');
    Route::post('/move', [AwsS3::class, 'move'])->name('move');

    // Route::get('/app', [AwsS3::class, 'index'])->name('index');

    /**
     *
     * Category paths
     *
     *  */
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}/delete', [CategoryController::class, 'destroy'])->name('category.delete');

    /**
     *
     * LogIn paths
     *
     *  */
    Route::get('/logout', [LogInController::class, 'logOut'])->name('logout');;
});


Route::get('/', [LogInController::class, 'show']);
Route::get('/login', [LogInController::class, 'show'])->name('login');
Route::post('/login', [LogInController::class, 'attempt'])->name('login');
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
