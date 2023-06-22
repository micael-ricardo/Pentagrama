@extends('template/layout')
@section('title', 'Cadastro de Localidades')
@section('conteudo')
    <form action="/cadastrar" method="POST">
        @csrf
        <h4 class="display-6">Cadastrar Cidade</h4>

        <div class="row mt-4">
            <div class="form-group col-md-4">
                <label for="nome">Cidade:</label>
                <select class="form-control select2" name="nome" id="nome" required></select>
            </div>
            {{-- Enviar Nome pelo Campo Hiden pois no Id está inserido o id da cidade --}}
            <input type="hidden" name="nome_cidade" id="nome_cidade">

            <div class="form-group col-md-4">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" name="estado" id="estado" readonly required>
            </div>
            <div class="form-group col-md-4">
                <label for="data_fundacao"> Data De Fundação:</label>
                <input type="date" class="form-control" name="data_fundacao" id="data_fundacao" required>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="cadastrarbairro">Deseja cadastrar o Bairro?</label>
                <input type="checkbox" value="1" onclick="return($('#CadastroBairro').toggle('fade'))"
                    name="cadastrarbairro" id="cadastrarbairro">
            </div>
        </div>

        <div id="CadastroBairro" class="col-md-12" style="display: none;">
            <h4 class="display-6">Cadastrar Bairro</h4>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nome_bairro">Bairro:</label>
                    <select class="form-control select2-bairros" name="nome_bairro" id="nome_bairro">
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="cep">CEP:</label>
                    <input type="text" class="form-control" name="cep" id="cep" required>
                </div>
                
            </div>
        </div>

        <div class="col-md-12 mt-5">
            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar </button>
            <a   href="{{ route('cidades.index') }}"  class="btn btn-danger"><i class="bi bi-trash"></i>Cancelar</a>
        </div>
   
        <script src="{{ asset('js/cidade_bairro.js') }}"></script>
    </form>
@endsection
