<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
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

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('guest')
    ->name('admin.')
    ->group(function () {

        Route::get('/user', function () {
            return view('welcome');
        });
        Route::get('/news', [AdminNewsController::class, 'index'])->name('news');

    });

Route::get('/', function () {
    return view('welcome');
});


//не авторизованая зона
Route::group(['middleware' => ['guest']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home312');
    Route::get('/user', [HomeController::class, 'user'])->name('user');
    Route::get('/request', [HomeController::class, 'request'])->name('request');

    Route::resource('/news', NewsController::class);

    Route::get('/news_api', [NewsController::class, 'indexApi'])->name('news_api');

    //Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    //Route::get('/create', [HomeController::class, 'request'])->name('news.create');
    //Route::post('/store', [HomeController::class, 'request'])->name('request');
    //Route::get('/request', [HomeController::class, 'request'])->name('request');
    //Route::get('/request', [HomeController::class, 'request'])->name('request');
    //Route::get('/request', [HomeController::class, 'request'])->name('request');
});

//авторизованая зона
Route::group(['middleware' => ['auth']], function () {
    Route::get('/account', function () {
        return 'About Page';
    });
});
