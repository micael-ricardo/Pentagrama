<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BairroController;
use Illuminate\Http\Request;
use App\Models\Cidade;


class CidadeController extends Controller
{
    public function index()
    {
        return view('cidade_bairro.listar');
    }

    public function create()
    {
        return view('cidade_bairro.cadastro');
    }
    public function cadastrar(Request $request, BairroController $bairroController, CepController $cepController)
    {
        DB::transaction(function () use ($request, $bairroController, $cepController) {
            $cidade = cidade::create([
                'nome' => $request->nome_cidade,
                'estado' => $request->estado,
                'data_fundacao' => $request->data_fundacao,
            ]);

            if ($request->has('cadastrarbairro')) {
                $bairroController->cadastrar($request, $cidade->id, $cepController);
            }
        });

        return redirect()->route('cidades.index')->with('success', 'Registro inserido com sucesso!');
    }


    public function destroy(string $id)
    {
        $cidade = cidade::findOrFail($id);
        $cidade->delete();
        return response()->json(['success' => true]);
    }
}
