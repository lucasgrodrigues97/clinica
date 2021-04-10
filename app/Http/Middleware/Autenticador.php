<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Autenticador
{
    public function handle($request, Closure $next)
    {
        if (! request()->is('entrar','registrar') && ! Auth::check()) {
            $request->session()->flash('mensagem2', "Faça login para poder continuar");
            return redirect('/entrar');
        }
        return $next($request);
    }
}
