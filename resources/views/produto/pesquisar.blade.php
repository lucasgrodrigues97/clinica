@extends('pesquisar')

@section('titulo')
    produto
@endsection
@section('entidade')
    produto:
@endsection

@section('corpo')
    @if(isset($produtos))
        @foreach($produtos as $produto)
            <a href="{{$produto->foto_url}}" target="_blank">
                <img src="{{$produto->foto_url}}" class="img-thumbnail" width="100px" height="100px">
            </a><br>
            ID: {{$produto->id}}<br>
            Nome do produto: {{$produto->nome_produto}}<br>
            Preço: R${{$produto->preco_produto}},00<br><hr>
        @endforeach
    @endif
@endsection
