@extends('template/layout')
    @section('title', 'Cadastrar Usuarios')
@section('conteudo')

    <div class="titulo">
        <h5> Cadastro Usuarios</h5>
    </div>

    @include('mensagens.mensagem')
    <form method="POST" action="{{ route('usuarios.store') }}">
        {{-- previne ataques CSRF --}}
        @csrf

        <div class="row mt-4">
            <div class="form-group col-md-6">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group col-md-6 senha">
                <label for="password">senha:</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="new-password" required>
            </div>

            <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar </button>
                <a href="{{ route('login') }}" class="btn btn-danger"><i class="fa fa-times"></i>
                    Cancelar</a>
            </div>
    </form>

    <script>

$(document).ready(function () {

var $checkbox = $('#alterarSenha');
$('#password').removeAttr('required');
$checkbox.click(function () {
    if ($checkbox.is(':checked')) {
        $('#password').attr('required', true);
    } else {
        $('#password').removeAttr('required');
    }
});
});
    </script>

@endsection