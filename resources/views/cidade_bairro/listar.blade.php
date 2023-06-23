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
                <input type="text" class="form-control" name="cidade" id="cidade" />
            </div>
            <div class="form-group col-sm-4">
                <label>Bairro:</label>
                <input type="text" class="form-control" name="bairro" id="bairro" />
            </div>
            <div class="form-group col-sm-4">
                <label>Rua:</label>
                <input type="text" class="form-control" name="rua" id="rua" />
            </div>
            <div class="form-group col-sm-4">
                <label>Cep:</label>
                <input type="text" class="form-control" name="cep" id="cep" />
            </div>
        </div>
    </div>


    <table id="datatable" class="table table-striped table-bordered w-100">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Rua</th>
                <th>Cep</th>
                <th>Data Fundação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <!-- Modal De Delete -->
    <div class="modal fade" id="ModalDeletar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        role="dialog" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Excluir local</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal-body" class="modal-body">
                    Tem certeza que deseja excluir o local: <b><span id="nome-cidade"> </span>, <span id="nome-bairro"> </span></b> ? Esta ação
                    não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <form id="formExcluir" action="{{ route('cidades.delete', ':id') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('js/DataTableLocal.js') }}"></script>
    <script>
        const dataTable = "{{ route('datatable') }}";
    </script>
@endsection
