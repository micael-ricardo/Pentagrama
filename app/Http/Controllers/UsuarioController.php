<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
// use App\Http\Requests\UsuarioCandidatoRequest;

use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    // Criação do usuário + Candidato
    public function storeWithCandidato(Request $request)
    {

        // Criação do usuário
        $user = User::create([
            'name' => $request->input('nome'),
            'email' => $request->input('email'),
            'password' =>  bcrypt($request->input('password')),
        ]);

        Auth::login($user);
      
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Candidato cadastrado com sucesso! Por favor, faça login.');
    }

    public function create()
    {
        return view('login.cadastro');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->input('userId'));

        // atualiza o usuário
        $user->name = $request->input('nome');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
    }
}