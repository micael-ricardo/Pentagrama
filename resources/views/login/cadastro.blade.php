@extends('template/layout')
@section('title', 'Cadastrar Usuário')
@section('conteudo')

    <h4 class="display-6">Cadastro Usuário</h4>

    @include('mensagens.mensagem')
    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf

        <div class="row mt-4">
            <div class="form-group col-md-4">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group col-md-4">
                <label for="password">senha:</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="new-password"
                    required>
            </div>

            <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar </button>
                <a href="{{ route('login') }}" class="btn btn-danger"><i class="bi bi-trash"></i>
                    Cancelar</a>
            </div>
    </form>
@endsection
