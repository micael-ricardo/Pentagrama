<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cep;


class CepController extends Controller
{
    public function cadastrar(Request $request, $idBairro)
    {
        cep::create([
            'cep' => $request->cep,
            'rua' => $request->rua,
            'bairro_id' => $idBairro,
        ]);
    }
}
