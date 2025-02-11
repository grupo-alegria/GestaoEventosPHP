<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;


class ParticipanteController extends Controller
{
    public function index()
    {
        return view('auth.cadastroParticipante');
    }
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|min:3',
            'cpf' => ['nullable', 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
            'email' => 'required|email|unique:cadastros,email',
            'dataNasc' => 'required|date',
            'senha' => 'required|min:6',
        ]);

        // Criando o registro no banco de dados
        Participante::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'data' => $request->data,
            'senha' => bcrypt($request->senha) //criptografia da senha
        ]);

        return redirect()->back()->with('success', 'Cadastro realizado com sucesso!');
    }
}
