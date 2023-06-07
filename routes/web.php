<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;

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

Route::get('/', function () {
    return view('cidade_bairro.cadastro');
});

Route::post('/cidades/data-de-fundacao', 'CidadeController@getDataDeFundacao')->name('cidades.dataDeFundacao');
Route::post('/cadastrar', [CidadeController::class, 'cadastrar']);
