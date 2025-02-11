<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizador;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;


class OrganizadorController extends Controller
{
    public function index()
    {
        return view('auth.cadastroOrganizador');
    }

    public function home()
    {
        $organizador = Auth::user();

        if (!$organizador) {
            return redirect()->with('error', 'Você precisa estar logado para acessar essa página.');
        }

        $eventos = Evento::where('organizador_id', $organizador->id)->get();

        return view('home.homeOrganizador', compact('organizador', 'eventos'));
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|min:3',
            'cnpj' => ['nullable', 'regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/'],
            'cpf' => ['nullable', 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
            'email' => 'required|email|unique:organizadors,email',
            'senha' => 'required|min:6',
        ]);

        // Criando o registro no banco de dados
        $organizador = Organizador::create([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'senha' => bcrypt($request->senha) // Criptografia da senha
        ]);

        // Autenticar o organizador recém-criado
        Auth::login($organizador);

        // Redirecionar para a home do organizador
        return redirect()->route('organizador.home')->with('success', 'Cadastro realizado com sucesso!');
    }
}
