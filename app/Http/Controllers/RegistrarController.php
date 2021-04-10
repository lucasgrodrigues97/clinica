<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    public function create()
    {
        return view('registrar.create');
    }

    public function store(RegistroRequest $request)
    {
        $data = $request->except('_token');
        $exiteEmail = User::query()->where('email', $request->email)->count();
        if (! $exiteEmail == false) {
            return redirect()->back()->withErrors('Esse e-mail já está cadastrado');
        }
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return redirect('/inicio');
    }
}
