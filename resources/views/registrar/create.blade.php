@extends('layout')

@section('cabecalho')
    Registre-se
@endsection

@section('conteudo')
    <div class="row">

        <div class="card-login">
            <div class="card">
                <div class="card-header">
                    Crie sua conta
                </div>
                <div class="card-body">
                    <form method="post" class="mb-2">
                        @csrf
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Digite seu E-mail">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Digite sua Senha">
                        </div>

                        <button class="btn btn-lg btn-outline-secondary btn-block" type="submit">Criar</button>
                    </form>
                    <a href="/entrar" class="cor-link">Voltar</a><br>
                    @include('errors', ['errors' => $errors])
                </div>
            </div>
        </div>
@endsection
