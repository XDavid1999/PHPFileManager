<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

Route::group(['middleware' => ['auth']], function() {
    // Route::get('/dashboard', function () {
    //     $array = array(
    //         "Fichero1.pdf" => "Nombre1",
    //         "/Fichero2.pdf" => "Nombre2",
    //         "Fichero3.pdf" => "Nombre3",
    //         "/Fichero4.pdf" => "Nombre4",
    //     );

    //     return view('dashboard.dashboardBase',  ['array' => $array]);}) -> name('dashboard');

    Route::get('/dashboard', [DashboadController::class, 'show']) -> name('dashboard');
    /**
     *
     * Category paths
     *
     *  */
    Route::get('/category', [CategoryController::class, 'index']) -> name('category');
    Route::get('/category/create', [CategoryController::class, 'create']) -> name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store']) -> name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit']) -> name('category.edit');
    Route::put('/category/{category}/update', [CategoryController::class, 'update']) -> name('category.update');
    Route::delete('/category/{category}/delete', [CategoryController::class, 'destroy']) -> name('category.delete');

    /**
     *
     * LogIn paths
     *
     *  */
    Route::get('/logout', [LogInController::class, 'logOut']) -> name('logout'); ;
});


Route::get('/', [LogInController::class, 'show']);
Route::get('/login', [LogInController::class, 'show'])-> name('login');
Route::post('/login', [LogInController::class, 'attempt'])-> name('register');
Route::get('/register', [RegisterController::class, 'show']) -> name('register');
Route::post('/register', [RegisterController::class, 'register']) -> name('register');

