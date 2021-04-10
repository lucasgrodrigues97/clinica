@extends('pesquisar')

@section('titulo')
    paciente
@endsection
@section('entidade')
    paciente:
@endsection

@section('corpo')
    @if(isset($pacientes))
        @foreach($pacientes as $paciente)
            <a href="{{$paciente->foto_url}}" target="_blank">
                <img src="{{$paciente->foto_url}}" class="img-thumbnail" width="100px" height="100px">
            </a><br>
            ID: {{$paciente->id}}<br>
            Nome do paciente: {{$paciente->nome}}<br>
            Data de nascimento: {{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/Y')}}<br>
            Endereço: {{$paciente->endereco}}<br>
            <a class="cor-link-consulta" href="/pacientes/consultas/{{$paciente->id}}">Consultas do paciente</a><br><hr>
        @endforeach
    @endif
@endsection

