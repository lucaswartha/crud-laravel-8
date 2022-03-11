<?php

use Illuminate\Support\Facades\Route;

//CONTROLLER
use App\Http\Controllers\{
    PostController
};


Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::any('/posts/search', [PostController::class, 'search'])->name('posts.search');
Route::delete('/posts/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');


/*
Route::get('index', [PostController::class, 'index'])->name('index');
Route::get('create', [PostController::class, 'create'])->name('create');
Route::delete('destroy/{id}', [PostController::class, 'destroy'])->name('destroy');
Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [PostController::class, 'update'])->name('update');
Route::get('/store', [PostController::class, 'store'])->name('store');
Route::get('/show/{id}', [PostController::class, 'show'])->name('show');
*/





Route::get('/', function () {
    return view('welcome');
});
