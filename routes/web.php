<?php

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

Route::group(['namespace' => 'App\Http\Controllers'], function() { 
    Route::group(['middleware' => ['guest']], function() {
        Route::get('/', [StoriesController::class, 'index']);

        Route::get('/page/{slug}', [StoriesController::class, 'show']);
        Route::post('/createPost', [StoriesController::class, 'createPost'])->name('createPost');
        
        Route::get('/journal/{slug}', [UsersController::class, 'show']);

        Route::get('/login', [UsersController::class, 'login']);
        Route::post('/users/authenticate', [UsersController::class, 'authenticate']);

        Route::get('/register', [UsersController::class, 'register']);
        Route::post('/users/create', [UsersController::class, 'createUser'])->name('createUser');
    });

    Route::group(['middleware' => ['auth']], function() {
        Route::post('/logout',  [UsersController::class, 'logout']);
    });
});
