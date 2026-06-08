<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    SobreController,
    ContatoController,
    CategoriaController,
    ProdutoController,
    AuthController
};

// Rotas Institucionais
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');

// Rota de Categorias (Cria automaticamente index, create, store, show, edit, update e destroy)
Route::middleware(['auth'])->group(function () {
    Route::middleware('gerente')->group(function () {
        Route::resource('categorias', CategoriaController::class);
    });
});

// Rota de pRODUTOs (Cria automaticamente index, create, store, show, edit, update e destroy)
Route::resource('produtos', ProdutoController::class);

// rotas de autenticação
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'auth.dashboard')->name('dashboard');
    Route::resource('produtos', ProdutoController::class);
});

?>