<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Cidade;

class CidadeController extends Controller
{
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

    public function cadastrar(Request $request)
    {
        cidade::create([
            'nome' => $request->nome_cidade,
            'estado' => $request->estado,
            'data_fundacao' => $request->data_fundacao,
        ]);

        // return redirect()->route('cidade_bairro.cadastro')->with('success', 'Registro inserido com sucesso!');
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


    // Quando finalizar o basico tentar puxar a data de fundação das cidades de alguma forma

     // private function getFundacao($cidade)
    // {
    //     $sparqlQuery = "
    //         SELECT ?cidade ?cidadeLabel ?dataDeFundacao WHERE {
    //             ?cidade wdt:P31 wd:Q515.
    //             ?cidade rdfs:label ?cidadeLabel.
    //             ?cidade wdt:P571 ?dataDeFundacao.
    //             FILTER(LANG(?cidadeLabel) = 'pt').
    //         }
    //         LIMIT 1
    //         ";

    //     $client = new Client([
    //         'verify' => false,
    //     ]);
    //     // dd($sparqlQuery);

    //     $response = $client->get('https://query.wikidata.org/sparql', [
    //         'query' => [
    //             'format' => 'json',
    //             'query' => $sparqlQuery,
    //         ],
    //     ]);

    //     // dd(  $response);

    //     $data = json_decode($response->getBody(), true);


    //     if (count($data['results']['bindings']) > 0) {
    //         return $data['results']['bindings'][0]['dataDeFundacao']['value'];
    //     }

    //     return null;
    // }

    // public function getDataDeFundacao(Request $request)
    // {


    //     $cidade = $request->input('cidade');
    //     $dataDeFundacao = $this->getFundacao($cidade);
    //     // dd($dataDeFundacao);
    //     return response()->json(['dataDeFundacao' => $dataDeFundacao]);
    // }



}
