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


//  cadastra Usuario Candidato
Route::post('/usuarios', [UsuarioController::class, 'storeWithCandidato'])->name('usuarios.store');
Route::resource('usuario', UsuarioController::class);
Route::get('/cadastro', [UsuarioController::class, 'create'])->name('login.cadastro');


Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');

// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('/cidades', CidadeController::class, ['names' => 'cidades']);

Route::get('/datatable', [DataTableLocal::class, 'datatable'])->name('datatable');
// Cadastro Cidade Bairro
Route::post('/cadastrar', [CidadeController::class, 'cadastrar']);
Route::post('/cadastrar/{idCidade}', [BairroController::class, 'cadastrar'])->name('cadastrar.bairro');

// Se tiver tempo  inserir a data altomaticamente
// Route::post('/cidades/data-de-fundacao', [CidadeController::class, 'getDataDeFundacao'])->name('cidades.dataDeFundacao');
