<?php

use Illuminate\Support\Facades\Route;

//CONTROLLER
use App\Http\Controllers\{
    PostController
};


Route::get('index', [PostController::class, 'index'])->name('index');
Route::get('create', [PostController::class, 'create'])->name('create');
Route::delete('destroy/{id}', [PostController::class, 'destroy'])->name('destroy');
Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [PostController::class, 'update'])->name('update');
Route::get('/store', [PostController::class, 'store'])->name('store');
Route::get('/show/{id}', [PostController::class, 'show'])->name('show');





Route::get('/', function () {
    return view('welcome');
});
