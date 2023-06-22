<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bairro;


class CepController extends Controller
{
    public function cadastrar(Request $request, $idCidade)
    {
        bairro::create([
            'nome' => $request->nome_bairro,
            'cidade_id' => $idCidade,
        ]);
    }
}
