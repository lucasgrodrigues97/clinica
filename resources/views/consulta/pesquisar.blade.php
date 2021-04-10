@extends('pesquisar')

@section('titulo')
    consulta
@endsection
@section('entidade')
    consulta:
@endsection

@section('corpo')
    @if(isset($consultas))
        @foreach($consultas as $consulta)
            ID: {{$consulta->id}}<br>
            Nome da consulta: {{$consulta->nome_consulta}}<br>
            Preço: R${{$consulta->preco_consulta}},00<br><hr>
        @endforeach
    @endif
@endsection




