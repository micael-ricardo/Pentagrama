<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Cidade;

class CidadeController extends Controller
{





    public function cadastrar(Request $request)
    {
        cidade::create([
            'nome' => $request->nome_cidade,
            'estado' => $request->estado,
            'data_fundacao' => $request->data_fundacao,
        ]);
               
        // return redirect()->route('cidade_bairro.cadastro')->with('success', 'Registro inserido com sucesso!');

        // $nome = $request->input('nome');
        // $estado = $request->input('estado');
        // $data_fundacao = $request->input('data_fundacao');

        // Aqui você pode salvar os dados da cidade no banco de dados
    }




    //     private function getFundacao($cidade) {
    //         $sparqlQuery = "
    //             SELECT ?cidade ?cidadeLabel ?dataDeFundacao WHERE {
    //                 ?cidade wdt:P31 wd:Q515.
    //                 ?cidade rdfs:label ?cidadeLabel.
    //                 ?cidade wdt:P571 ?dataDeFundacao.
    //                 FILTER(CONTAINS(LCASE(?cidadeLabel), LCASE('$cidade'))).
    //                 FILTER(LANG(?cidadeLabel) = 'pt').
    //             }
    //             LIMIT 1
    //         ";

    //         $client = new Client();
    //         $response = $client->get('https://query.wikidata.org/sparql', [
    //             'query' => [
    //                 'format' => 'json',
    //                 'query' => $sparqlQuery,
    //             ],
    //         ]);

    //         $data = json_decode($response->getBody(), true);

    //         if (count($data['results']['bindings']) > 0) {
    //             return $data['results']['bindings'][0]['dataDeFundacao']['value'];
    //         }

    //         return null;
    //     }

    //    public function getDataDeFundacao(Request $request)
    // {
    //     $cidade = $request->input('cidade');
    //     $dataDeFundacao = $this->getFundacao($cidade);

    //     return response()->json(['dataDeFundacao' => $dataDeFundacao]);
    // }



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
