<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
// use App\Http\Requests\UsuarioRequest;

use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('nome'),
            'email' => $request->input('email'),
            'password' =>  bcrypt($request->input('password')),
        ]);

        Auth::login($user);
        return redirect()->route('login')->with('success', 'Candidato cadastrado com sucesso! Por favor, faça login.');
    }

    public function create()
    {
        return view('login.cadastro');
    }
}