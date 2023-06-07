<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;
use App\Models\CidadeBairroView;


class DataTableLocal extends Controller
{
    public function datatable(Request $request)
    {

        $query = CidadeBairroView::query();

        // Filtros

        if ($request->has('nome') && $request->input('nome') !== null) {
            $query->where('nome', 'LIKE', '%' . $request->input('nome') . '%');
        }
        // if ($request->has('telefone') && $request->input('telefone') !== null) {
        //     $query->where('telefone', 'ILIKE', '%' . $request->input('telefone') . '%');
        // }
        // if ($request->has('email') && $request->input('email') !== null) {
        //     $query->where('email', 'ILIKE', '%' . $request->input('email') . '%');
        // }
        // if ($request->has('curriculo') && $request->input('curriculo') !== null) {
        //     $query->where('curriculo', 'ILIKE', '%' . $request->input('curriculo') . '%');
        // }
        // if ($request->has('data_inicio') && $request->input('data_inicio') !== null) {
        //     $query->whereDate('created_at', '>=', $request->input('data_inicio'));
        // }

        // if ($request->has('data_fim') && $request->input('data_fim') !== null) {
        //     $query->whereDate('created_at', '<=', $request->input('data_fim'));
        // }

        // Retorna os dados filtrados se ouver filtro
        return DataTables::of($query)->toJson();

    }
}
