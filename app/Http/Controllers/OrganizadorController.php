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
        return view('organizador.auth.cadastroOrganizador');
    }

    public function home()
    {
        $organizador = Auth::guard('organizador')->user();

        if (!$organizador) {
            return redirect()->route('home')->with('error', 'Você precisa estar logado para acessar essa página.');
        }

        $eventos = Evento::where('organizador_id', $organizador->id)->get();

        return view('organizador.home.homeOrganizador', compact('organizador', 'eventos'));
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
        Auth::guard('organizador')->login($organizador);

        // Redirecionar para a home do organizador
        return redirect()->route('organizador.home')->with('success', 'Cadastro realizado com sucesso!');
    }
    
    public function edit()
    {
        $organizador = Auth::guard('organizador')->user();

        if (!$organizador) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para acessar essa página.');
        }
        return view('organizador.edit.editOrganizador', compact('organizador'));
    }

    public function update(Request $request, $id)
    {
        // Busca o participante pelo ID
        $organizador = Organizador::findOrFail($id);

        // Verifica se o organizador autenticado é o mesmo que está sendo atualizado
        if (Auth::guard('organizador')->id() !== $organizador->id) {
            return redirect()->route('organizador.home')->with('error', 'Você não tem permissão para atualizar este perfil.');
        }

        // Validação dos dados
        $request->validate([
            'nome' => 'required|min:3',
            'cnpj' => ['nullable', 'regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/'],
            'cpf' => ['nullable', 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
            'email' => 'required|email|unique:participantes,email,' . $organizador->id,
            'senha' => 'nullable|min:6',
        ]);

        // Atualiza os dados
        $organizador->update([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'senha' => $request->senha ? bcrypt($request->senha) : $organizador->senha, // Atualiza a senha apenas se for fornecida
        ]);

        return redirect()->route('organizador.home')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $organizador = Organizador::findOrFail($id);
        $organizador->delete();

        return redirect()->route('home')->with('success', 'Conta excluída com sucesso.');
    }
}
