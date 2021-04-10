@extends('layout')

@section('cabecalho')
    Pacientes
@endsection

@section('conteudo')

    @include('mensagem', ['mensagem' => $mensagem])

    @auth
        <div class=" d-flex justify-content-between">
            <a href="/pacientes/criar" class="btn btn-outline-secondary mb-2">
                Adicionar paciente
            </a>
            <a href="/pacientes/pesquisar" class="btn btn-outline-secondary mb-2">
                Pesquisar paciente
            </a>
        </div>
    @endauth

    <ul class="list-group">
        @foreach ($pacientes as $paciente)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <span id="atual-paciente-{{$paciente->id}}">
                        <a href="{{$paciente->foto_url}}" target="_blank">
                            <img src="{{$paciente->foto_url}}" class="img-thumbnail" width="100px" height="100px">
                        </a><br>
                        Nome do paciente: {{$paciente->nome}}<br>
                        Telefone: {{$paciente->telefone}}<br>
                        Endereco: {{$paciente->endereco}}<br>
                        Data de nascimento: {{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/Y')}}<br>
                    </span>
                    <a class="cor-link-consulta" href="/pacientes/consultas/{{$paciente->id}}">Consultas do paciente</a>
                </div>


                <span class="d-flex">

                    @auth
                        <form method="post" action="/pacientes/criar/{{isset($paciente) ? $paciente->id : ''}}">
                            @csrf
                            <button class="btn btn-info btn-sm mr-2">
                                <i class="fas fa-edit"></i>
                            </button>
                        </form>
                    @endauth

                    @auth
                        <form method="post" action="/pacientes/{{$paciente->id}}" onsubmit="return confirm('Tem certeza?')">
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

