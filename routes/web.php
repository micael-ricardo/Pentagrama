<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\BairroController;
use App\Http\Controllers\DataTableLocal;


Route::get('/', function () {
    return view('login.login');
});


//  cadastra Usuario
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/cadastro', [UsuarioController::class, 'create'])->name('login.cadastro');

// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::view('/login', 'login.login')->name('login');

Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::middleware(['auth'])->group(function () {
  //  Cidade Bairro
    Route::get('/datatable', [DataTableLocal::class, 'datatable'])->name('datatable');

    Route::resource('/cidades', CidadeController::class, ['names' => 'cidades']);
    Route::post('/cadastrar', [CidadeController::class, 'cadastrar']);
    Route::get('/cadastro-cidades', [CidadeController::class, 'create'])->name('cidades.cadastro');
    Route::delete('/cidades/{id}', [CidadeController::class, 'destroy'])->name('cidades.delete');

    Route::post('/cadastrar/{idCidade}', [BairroController::class, 'cadastrar'])->name('cadastrar.bairro');
});

