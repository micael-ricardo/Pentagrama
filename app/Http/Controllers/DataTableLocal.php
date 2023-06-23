<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;
use App\Models\CidadeBairroCepView;


class DataTableLocal extends Controller
{

    public function index()
    {
        return view('cidade_bairro.listar');
    }

    public function datatable(Request $request)
    {

        $query = CidadeBairroCepView::query();

        // Filtros
        if ($request->has('data_inicio') && $request->input('data_inicio') !== null) {
            $query->whereDate('data_fundacao', '>=', $request->input('data_inicio'));
        }

        if ($request->has('data_fim') && $request->input('data_fim') !== null) {
            $query->whereDate('data_fundacao', '<=', $request->input('data_fim'));
        }
        if ($request->has('estado') && $request->input('estado') !== null) {
            $query->where('estado', 'LIKE', '%' . $request->input('estado') . '%');
        }
        if ($request->has('cidade') && $request->input('cidade') !== null) {
            $query->where('cidade', 'LIKE', '%' . $request->input('cidade') . '%');
        }
        if ($request->has('bairro') && $request->input('bairro') !== null) {
            $query->where('bairro', 'LIKE', '%' . $request->input('bairro') . '%');
        }
        if ($request->has('rua') && $request->input('rua') !== null) {
            $query->where('rua', 'LIKE', '%' . $request->input('rua') . '%');
        }
        if ($request->has('cep') && $request->input('cep') !== null) {
            $query->where('cep', 'LIKE', '%' . $request->input('cep') . '%');
        }
        return DataTables::of($query)->toJson();
    }
}
