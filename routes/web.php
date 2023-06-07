<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\BairroController;
use App\Http\Controllers\DataTableLocal;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('cidade_bairro.cadastro');
// });
// Se tiver tempo vou tentar de tudo para inserir a data altomaticamente
// Route::post('/cidades/data-de-fundacao', [CidadeController::class, 'getDataDeFundacao'])->name('cidades.dataDeFundacao');

Route::resource('/cidades', CidadeController::class, ['names' => 'cidades']);

Route::get('/datatable', [DataTableLocal::class, 'datatable'])->name('datatable');


Route::post('/cadastrar', [CidadeController::class, 'cadastrar']);
Route::post('/cadastrar/{idCidade}', [BairroController::class, 'cadastrar'])->name('cadastrar.bairro');

