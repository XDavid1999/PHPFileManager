<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\RegisterController;

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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboardBase');
    }) -> name('dashboard');

    Route::get('/owncontent', function () {
        return view('owncontent.owncontent');
    }) -> name('owncontent');


    Route::get('/logout', function(){
        return (new LogInController()) -> logOut();
    }) -> name('logout');
});


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return LogInController::show();
})-> name('login');

Route::post('/login', function () {
    return (new LogInController()) -> attempt();
});

Route::get('/register', function () {
    return RegisterController::show();
}) -> name('register');

Route::post('/register', function () {
    return (new RegisterController()) -> register();
}) -> name('register');

