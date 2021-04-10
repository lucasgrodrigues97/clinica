@extends('layout')

@section('cabecalho')
    Início
@endsection

@section('conteudo')
    <div class="row">

        <div class="card-home">
            <div class="card">
                <div class="card-header">
                    Menu
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center">
                            <h5><a href="/pacientes" class="cor-link">Tela de Pacientes</a></h5>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <h5><a href="/produtos" class="cor-link">Tela de Produtos</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
