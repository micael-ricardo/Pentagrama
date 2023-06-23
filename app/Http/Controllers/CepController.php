<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cep;


class CepController extends Controller
{
    public function cadastrar(Request $request, $idBairro)
    {
        if (cep::where('rua', $request->rua)->exists()) {
            return false;
        }

        $RemoverMascara = preg_replace('/[^0-9]/', '', $request->cep);

        cep::create([
            'cep' => $RemoverMascara,
            'rua' => $request->rua,
            'bairro_id' => $idBairro,
        ]);
        return true;
    }
}
