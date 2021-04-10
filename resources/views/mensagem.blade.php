@if (!empty($mensagem))
    <div class="alert alert-success">
        {{$mensagem}}
    </div>
@endif

@if (!empty($mensagem2))
    <div class="alert alert-danger mt-2">
        {{$mensagem2}}
    </div>
@endif
