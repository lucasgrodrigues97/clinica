@extends('layout')

@section('cabecalho')
    {{isset($consulta) ? 'Alterar consulta': 'Adicionar consulta'}}
@endsection

@section('conteudo')

    <form method="post" action="{{isset($consulta) ? '/consultas/criar/' . $consulta->id . '/efetuar' : ''}}">
        @csrf

        <div class="row mt-2">
            <div class="col col-6">
                <label for="nome_consulta" class="">Nome da consulta</label>
                <input type="text" required class="form-control" name="nome_consulta" id="nome_consulta" value="{{isset($consulta) ? $consulta->nome_consulta : ''}}">
            </div>
            <div class="col col-3">
                <label for="data_consulta" class="">Data da consulta</label>
                <input type="date" required class="form-control" name="data_consulta" id="data_consulta" value="{{isset($consulta) ? $consulta->data_consulta : ''}}">
            </div>
            <div class="col col-3 mt-1">
                <label for="preco_consulta" class="">Preço da consulta</label>
                <input type="number" required class="form-control" name="preco_consulta" id="preco_consulta" value="{{isset($consulta) ? $consulta->preco_consulta : ''}}">
            </div>
            <div class="col col-12 mt-1">
                <label for="dados_consulta" class="">Dados da consulta</label>
                <textarea class="form-control" name="dados_consulta" id="dados_consulta" cols="30" rows="7">{{ isset($consulta) ? $consulta->dados_consulta : '' }}</textarea>
            </div>
        </div>

        <button class="btn btn-outline-secondary mt-3">{{isset($consulta) ? 'Alterar': 'Adicionar'}}</button>
    </form>
    @include('errors', ['errors' => $errors])

@endsection
