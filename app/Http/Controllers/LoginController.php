<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processa o login
    public function login(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
            'tipo' => 'required|in:organizador,participante', // Garante que o tipo seja válido
        ]);

        // Credenciais do usuário
        $credentials = [
            'email' => $request->email,
            'password' => $request->senha, // Mapeia 'senha' para 'password'
        ];

        // Tenta autenticar o usuário com base no tipo selecionado
        if ($request->tipo === 'organizador') {
            $guard = 'organizador';
        } else {
            $guard = 'participante'; // Corrigido para 'participante'
        }

        if (Auth::guard($guard)->attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect()->route($guard . '.home'); // Corrigido o nome da rota
        }

        // Autenticação falhou
        return redirect()->route('login')->with('error', 'Credenciais inválidas ou conta não encontrada.');
    }

}
