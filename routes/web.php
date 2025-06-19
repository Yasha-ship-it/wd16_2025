<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//не авторизованая зона
Route::group(['middleware' => ['guest']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home312');
});

//авторизованая зона
Route::group(['middleware' => ['auth']], function () {
    Route::get('/account', function () {
        return 'About Page';
    });
});
