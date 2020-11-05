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
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('admin')->group(function (){

        Route::get('posts', [\App\Http\Controllers\PostsInertiaController::class, 'index'])->name('admin.posts');
        Route::get('posts/create', [\App\Http\Controllers\PostsInertiaController::class, 'create'])->name('admin.posts.create');
        Route::get('posts/{id}', [\App\Http\Controllers\PostsInertiaController::class, 'show'])->name('admin.posts.record');
        Route::get('posts/edit/{id}', [\App\Http\Controllers\PostsInertiaController::class, 'edit'])->name('admin.posts.record.edit');

        Route::post('posts/create', [\App\Http\Controllers\PostsInertiaController::class, 'store']);
        Route::post('posts/{post}', [\App\Http\Controllers\PostsInertiaController::class, 'update']);
        Route::post('posts/delete/{id}', [\App\Http\Controllers\PostsInertiaController::class, 'destroy']);
    });
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return redirect('admin/posts');
        })->name('dashboard');
    });
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
