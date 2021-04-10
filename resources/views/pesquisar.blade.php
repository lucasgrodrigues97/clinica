@extends('layout')

@section('cabecalho')
    Pesquisar @yield('titulo')
@endsection

@section('conteudo')

    <form method="post" enctype="multipart/form-data" class="mb-2">
        @csrf
        <div class="row mt-2">
            <div class="col col-6">
                <label for="nome" class="">Nome do @yield('entidade')</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
        </div>
        <button class="btn btn-outline-secondary mt-2">Pesquisar</button>
    </form><br>
    @yield('corpo')
    @include('errors', ['errors' => $errors])
@endsection
