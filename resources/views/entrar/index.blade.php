@extends('layout')

@section('cabecalho')
    Clínica Dra. Ana Mello
@endsection

@section('conteudo')

    <div class="row">

        <div class="card-login">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form method="post" class="mb-2">
                        @csrf
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Senha">
                        </div>

                        <button class="btn btn-lg btn-outline-secondary btn-block" type="submit">Entrar</button>
                    </form>

                    <a href="/registrar" class="cor-link">Criar conta</a><br>
                    @include('errors', ['errors' => $errors])
                    @include('mensagem', ['mensagem2' => $mensagem2])

                </div>
            </div>
        </div>
@endsection
