<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\SobreController;
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');

use App\Http\Controllers\ContatoController;
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');