<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index(Request $request)
    {
        $mensagem2 = $request->session()->get('mensagem2');
        $request->session()->remove('mensagem2');
        return view('entrar.index', compact('mensagem2'));
    }

    public function entrar(Request $request)
    {
        if (! Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors('E-mail ou senha inválidos');
        }
        return redirect('/inicio');
    }
}
