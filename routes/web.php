<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StoriesController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function() { 
    Route::group(['middleware' => ['guest']], function() {
        Route::get('/', [StoriesController::class, 'index']);

        Route::get('/page/{slug}', [StoriesController::class, 'show']);
        Route::post('/createPost', [StoriesController::class, 'store'])->name('createPost');
        
        Route::get('/journal/{slug}', [UsersController::class, 'show']);

        Route::get('/login', [UsersController::class, 'index']);
        Route::post('/users/authenticate', [UsersController::class, 'authenticate'])->name('authenticate');

        Route::get('/register', [UsersController::class, 'create']);
        Route::post('/users/create', [UsersController::class, 'store'])->name('store');
    });

    Route::group(['middleware' => ['auth']], function() {
        Route::post('/logout',  [UsersController::class, 'logout']);
    });
});
