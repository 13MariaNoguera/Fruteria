<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrutaController;
use App\Http\Controllers\LoginController;

Route::get('/', [FrutaController::class, 'index'])->name('fruteria.index');


// RUTAS MOSTRAR, EDITAR Y ELIMINAR FRUTA
Route::prefix('fruta')->group(function () {
    Route::get('/{id}', [FrutaController::class, 'show'])->name('fruteria.show');
    Route::get('/{id}/edit', [FrutaController::class, 'edit'])->name('fruteria.edit')->middleware('auth');
    Route::delete('/{id}', [FrutaController::class, 'destroy'])->name('fruteria.delete')->middleware('auth');
    Route::put('/{id}/update', [FrutaController::class, 'update'])->name('fruteria.update')->middleware('auth');
});

Route::get('/create', [FrutaController::class, 'create'])->name('fruteria.create')->middleware('auth');
Route::post('/add/fruta', [FrutaController::class, 'store'])->name('fruteria.store')->middleware('auth');


// LOGIN 
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);


// LOGOUT
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');