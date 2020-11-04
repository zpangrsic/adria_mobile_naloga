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

Route::prefix('admin')->group(function (){
    Route::get('posts', [\App\Http\Controllers\PostsController::class, 'index']);
    Route::post('posts', [\App\Http\Controllers\PostsController::class, 'create']);
    Route::get('posts/{id}', [\App\Http\Controllers\PostsController::class, 'show']);
    Route::post('posts/{id}', [\App\Http\Controllers\PostsController::class, 'update']);
    Route::post('posts/delete/{id}', [\App\Http\Controllers\PostsController::class, 'destroy']);
});

Route::prefix('posts')->group(function () {
    Route::get('/{post}', [\App\Http\Controllers\PostsController::class, 'show']);
    Route::get('/', function () {
        return redirect('/');
    });
});

Route::get('/', function () {
    return view('index');
});

Route::get('/contact-form', [\App\Http\Controllers\FormController::class, 'index']);
