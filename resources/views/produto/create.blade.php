@extends('layout')

@section('cabecalho')
    {{isset($produto) ? 'Alterar produto': 'Adicionar produto'}}
@endsection

@section('conteudo')

    <form method="post" action="{{isset($produto) ? '/produtos/criar/' . $produto->id . '/efetuar' : ''}}" enctype="multipart/form-data">
        @csrf

        <div class="row mt-2">
            <div class="col col-6">
                <label for="nome_produto" class="">Nome do produto</label>
                <input type="text" required class="form-control" name="nome_produto" id="nome_produto" value="{{isset($produto) ? $produto->nome_produto : ''}}">
            </div>
            <div class="col col-3">
                <label for="preco_produto" class="">Preço do paciente</label>
                <input type="number" required class="form-control" name="preco_produto" id="preco_produto" value="{{isset($produto) ? $produto->preco_produto : ''}}">
            </div>
            <div class="col col-12 mt-1">
                <label for="foto_produto" class="">Foto do produto</label>
                <input type="file" class="form-control" name="foto_produto" id="foto_produto" value="{{isset($produto) ? $produto->foto : ''}}">
            </div>
        </div>

        <button class="btn btn-outline-primary mt-3">{{isset($produto) ? 'Alterar': 'Adicionar'}}</button>
    </form>
    @include('errors', ['errors' => $errors])
@endsection
