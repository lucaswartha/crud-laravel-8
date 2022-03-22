<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//CONTROLLER
use App\Http\Controllers\{
    PostController
};

Route::get('/motos', [PostController::class, 'motos'])->name('motos');
Route::get('/carros', [PostController::class, 'carros'])->name('carros');

//destroy
Route::delete('/destroyCarros/{id}', [PostController::class, 'destroyCarros'])->name('destroyCarros');
Route::delete('/destroyMotos/{id}', [PostController::class, 'destroyMotos'])->name('destroyMotos');
//store
Route::get('/storeMotos', [PostController::class, 'storeMotos'])->name('storeMotos');
Route::get('/storeCarros', [PostController::class, 'storeCarros'])->name('storeCarros');
//update
Route::put('/updateCarros/{id}', [PostController::class, 'updateCarros'])->name('updateCarros');
Route::put('/updateMotos/{id}', [PostController::class, 'updateMotos'])->name('updateMotos');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
