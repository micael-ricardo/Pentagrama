<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;
use App\Models\CidadeBairroView;


class DataTableLocal extends Controller
{

    public function index()
    {
        return view('cidade_bairro.listar');
    }

    public function datatable(Request $request)
    {

        $query = CidadeBairroView::query();

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
        if ($request->has('nome') && $request->input('nome') !== null) {
            $query->where('nome', 'LIKE', '%' . $request->input('nome') . '%');
        }
        if ($request->has('bairro_nome') && $request->input('bairro_nome') !== null) {
            $query->where('bairro_nome', 'LIKE', '%' . $request->input('bairro_nome') . '%');
        }
        return DataTables::of($query)->toJson();
    }
}
