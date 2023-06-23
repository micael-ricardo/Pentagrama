<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bairro;
use App\Http\Controllers\CepController;


class BairroController extends Controller
{
    public function cadastrar(Request $request, $idCidade, CepController $cepController)
    {
        $bairro = bairro::create([
            'nome' => $request->nome_bairro,
            'cidade_id' => $idCidade,
        ]);
    
        if ($request->has('cadastrarcep')) {
            if (!$cepController->cadastrar($request, $bairro->id)) {
                return false;
            }
        }
    
        return true;
    }
    
}
