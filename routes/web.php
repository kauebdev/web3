<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    SobreController,
    ContatoController,
    CategoriaController,
    ProdutoController
};

// Rotas Institucionais
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');

// Rota de Categorias (Cria automaticamente index, create, store, show, edit, update e destroy)
Route::resource('categorias', CategoriaController::class);

Route::resource('produtos', ProdutoController::class);

?>