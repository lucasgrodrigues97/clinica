@extends('layout')

@section('cabecalho')
    {{isset($paciente) ? 'Alterar paciente': 'Adicionar paciente'}}
@endsection

@section('conteudo')

    <form method="post" action="{{isset($paciente) ? '/pacientes/criar/' . $paciente->id . '/efetuar' : ''}}" enctype="multipart/form-data">
        @csrf

        <div class="row mt-2">
            <div class="col col-6">
                <label for="nome" class="">Nome do paciente</label>
                <input type="text" required class="form-control" name="nome" id="nome" value="{{isset($paciente) ? $paciente->nome : ''}}">
            </div>
            <div class="col col-3">
                <label for="telefone" class="">Telefone do paciente</label>
                <input type="text" required class="form-control" name="telefone" id="telefone" value="{{isset($paciente) ? $paciente->telefone : ''}}">
            </div>
            <div class="col col-3">
                <label for="data_nascimento" class="">Data de nascimento do paciente</label>
                <input type="date"  required  class="form-control" name="data_nascimento" id="data_nascimento" value="{{isset($paciente) ? $paciente->data_nascimento : ''}}">
            </div>
            <div class="col col-12 mt-1">
                <label for="foto" class="">Foto do paciente</label>
                <input type="file" class="form-control" name="foto" id="foto" value="{{isset($paciente) ? $paciente->foto : ''}}">
            </div>
            <div class="col col-12 mt-1">
                <label for="endereco" class="">Endereço do paciente</label>
                <input type="text" required class="form-control" name="endereco" id="endereco" value="{{isset($paciente) ? $paciente->endereco : ''}}">
            </div>

        </div>

        <button class="btn btn-outline-primary mt-3">{{isset($paciente) ? 'Alterar': 'Adicionar'}}</button>
    </form>
    @include('errors', ['errors' => $errors])
@endsection
