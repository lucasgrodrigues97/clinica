@extends('layout')

@section('cabecalho')
    Consultas de {{$paciente->nome}}
@endsection

@section('conteudo')

    @if($paciente->foto)
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <a href="{{$paciente->foto_url}}" target="_blank">
                    <img src="{{$paciente->foto_url}}" class="img-thumbnail" height="400px" width="400px">
                </a>
            </div>
        </div>
    @endif

    @include('mensagem', ['mensagem' => $mensagem])

    @auth
        <div class=" d-flex justify-content-between">
            <a href="/consultas/criar/{{$paciente->id}}" class="btn btn-outline-secondary mb-2">
                Criar consulta
            </a>
            <a href="/consultas/pesquisar" class="btn btn-outline-secondary mb-2">
                Pesquisar consulta
            </a>
        </div>
    @endauth

    <ul class="list-group mb-5">
        @foreach ($consultas as $consulta)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Nome da consulta: {{$consulta->nome_consulta}}<br>
                Preço: R${{$consulta->preco_consulta}},00<br>
                Data: {{ \Carbon\Carbon::parse($consulta->data_consulta)->format('d/m/Y')}}<br>
                Dados da consulta: {{$consulta->dados_consulta}}<br>
                <span class="d-flex">
                    @auth
                        <form method="post" action="/consultas/{{$paciente->id}}/editarConsulta/{{$consulta->id}}">
                            @csrf
                            <button class="btn btn-info btn-sm mr-2">
                                <i class="fas fa-edit"></i>
                            </button>
                        </form>
                    @endauth
                    @auth
                        <form method="post" action="/consultas/{{$paciente->id}}/{{$consulta->id}}" onsubmit="return confirm('Tem certeza?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    @endauth

                </span>
            </li>

        @endforeach
    </ul>

@endsection

