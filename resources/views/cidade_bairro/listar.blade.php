@extends('template/layout')
@section('title', 'Localidades')
@section('conteudo')

    <h5>Localidades</h5>
    @include('mensagens.mensagem')

    <!-- adc -->
    <div class="input-group mb-3">
        <div class="input-group-append">
            <a href="{{ route('cidades.create') }}" class="btn btn-success"><i class="bi bi-plus"></i> Adicionar</a>
            <button type="button" class="btn btn-info" id="div-filtro" onclick="return($('#filtro').toggle('fade'))">
                <i class="bi bi-funnel"></i> Filtros
            </button>
        </div>
    </div>
    <!--  filtros -->
    <div class="panel panel-inverse mb-3" id="filtro" style=" display: none;">
        <div class="row">
            <div class="form-group col-sm-2">
                <label>Data Início:</label>
                <input type="date" class="form-control" name="data_inicio" id="data_inicio" />
            </div>

            <div class="form-group col-sm-2">
                <label>Data Fim:</label>
                <input type="date" class="form-control" name="data_fim" id="data_fim" />
            </div>
            <div class="form-group col-sm-4">
                <label>Estado:</label>
                <input type="text" class="form-control" name="estado" id="estado" />
            </div>
            <div class="form-group col-sm-4">
                <label>Cidade:</label>
                <input type="text" class="form-control" name="nome" id="nome" />
            </div>
            <div class="form-group col-sm-4">
                <label>Bairro:</label>
                <input type="text" class="form-control" name="bairro_nome" id="bairro_nome" />
            </div>
        </div>
    </div>


    <table id="datatable" class="table table-striped table-bordered w-100">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Cidade</th>
                <th>Cidade</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script src="{{ asset('js/DataTableLocal.js') }}"></script>
    <script>const dataTable = "{{ route('datatable') }}";</script>
@endsection