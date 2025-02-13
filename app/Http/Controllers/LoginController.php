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
        $credentials = $request->only('email', 'senha');

        // Tenta autenticar o usuário com base no tipo selecionado
        if ($request->tipo === 'organizador') {
            $guard = 'organizador';
        } else {
            $guard = 'participante';
        }

        if (Auth::guard($guard)->attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect()->route($guard . '.home');
        }

        // Autenticação falhou
        return redirect()->route('login')->with('error', 'Credenciais inválidas ou conta não encontrada.');
    }
}