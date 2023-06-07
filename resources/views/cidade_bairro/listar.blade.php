@extends('template/layout')
@section('title', 'Candidaturas')
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
    <div class="panel panel-inverse" id="filtro" style=" display: none;">
        <div class="row">
            <div class="form-group col-sm-4">
                <label>Data Início:</label>
                <input type="date" class="form-control" name="data_inicio" id="data_inicio" />
            </div>

            <div class="form-group col-sm-4">
                <label>Data Fim:</label>
                <input type="date" class="form-control" name="data_fim" id="data_fim" />
            </div>

            <div class="form-group col-sm-4">
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" />
            </div>
            <div class="form-group col-sm-4">
                <label>Email:</label>
                <input type="text" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group col-sm-4">
                <label>Telefone:</label>
                <input type="tel" class="form-control" name="telefone" id="telefone" />
            </div>
            <div class="form-group col-sm-4">
                <label>Currículo:</label>
                <input type="text" class="form-control" name="curriculo" id="curriculo" />
            </div>

        </div>
    </div>


    <table id="datatable">
        <thead>
            <tr>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody></tbody> <!-- Adicione esta linha -->
    </table>

    <script src="{{ asset('js/DataTableLocal.js') }}"></script>
    <script>const dataTable = "{{ route('datatable') }}";</script>
@endsection