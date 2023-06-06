@extends('template/layout')
@section('title', 'Cadastro de Localidades')
@section('conteudo')
    <h4 class="display-6">Cadastro de Localidades</h4>

    <form action="/cadastrar" method="POST">
        <h2>Cadastro de Cidade</h2>
        <label for="cidade_nome">Nome da Cidade:</label>
        <input type="text" id="cidade_nome" name="cidade_nome">
        <label for="cidade_estado">Estado:</label>
        <label for="cidade_data_fundacao">Data de Fundação:</label>
        <input type="date" id="cidade_data_fundacao" name="cidade_data_fundacao">



        {{-- <h2>Cadastro de Bairro</h2>
    <label for="bairro_cidade">Cidade:</label>
    <select id="bairro_cidade" name="bairro_cidade">
        <!-- Opções de cidades aqui -->
    </select>
    
    <label for="bairro_nome">Nome do Bairro:</label>
    <input type="text" id="bairro_nome" name="bairro_nome"> --}}

        <input type="submit" value="Cadastrar">
    </form>
@endsection
