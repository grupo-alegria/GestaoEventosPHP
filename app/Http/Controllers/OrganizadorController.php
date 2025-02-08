<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizador;

class OrganizadorController extends Controller
{
    public function index()
    {
        return view('cadastroOrganizador');
    }
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|min:3',
            'cnpj' => ['nullable', 'regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/'],
            'cpf' => ['nullable', 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
            'email' => 'required|email|unique:cadastros,email',
            'senha' => 'required|min:6',
        ]);

        // Criando o registro no banco de dados
        Organizador::create([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'senha' => bcrypt($request->senha) //criptografia da senha
        ]);

        return redirect()->back()->with('success', 'Cadastro realizado com sucesso!');
    }
}
