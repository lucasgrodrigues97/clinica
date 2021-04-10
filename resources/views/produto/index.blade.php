@extends('layout')

@section('cabecalho')
    Produtos
@endsection

@section('conteudo')

    @include('mensagem', ['mensagem' => $mensagem])

    @auth
        <div class=" d-flex justify-content-between">
            <a href="/produtos/criar" class="btn btn-outline-secondary mb-2">
                Adicionar produto
            </a>
            <a href="/produtos/pesquisar" class="btn btn-outline-secondary mb-2">
                Pesquisar produto
            </a>
        </div>
    @endauth

    <ul class="list-group mb-5">
        @foreach ($produtos as $produto)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <span id="atual-paciente-{{$produto->id}}">
                        <a href="{{$produto->foto_url}}" target="_blank">
                            <img src="{{$produto->foto_url}}" class="img-thumbnail" width="100px" height="100px">
                        </a><br>
                        Nome do produto: {{$produto->nome_produto}}<br>
                        Preço: R${{$produto->preco_produto}},00<br>
                    </span>
                </div>


                <span class="d-flex">

                    @auth
                        <form method="post" action="/produtos/criar/{{isset($produto) ? $produto->id : ''}}">
                            @csrf
                            <button class="btn btn-info btn-sm mr-2">
                                <i class="fas fa-edit"></i>
                            </button>
                        </form>
                    @endauth

                    @auth
                        <form method="post" action="/produtos/{{$produto->id}}" onsubmit="return confirm('Tem certeza?')">
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

