<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\Ingresso;
use Illuminate\Support\Facades\Auth;

class ParticipanteController extends Controller
{
    public function index()
    {
        return view('participante.auth.cadastroParticipante');
    }
    public function home()
    {
        $participante = Auth::guard('participante')->user();

        if (!$participante) {
            return redirect()->route('home')->with('error', 'Você precisa estar logado para acessar essa página.');
        }

        $ingressos = Ingresso::where('participante_id', $participante->id)->get();

        return view('participante.home.homeParticipante', compact('participante', 'ingressos'));
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|min:3',
            'cpf' => ['nullable', 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
            'email' => 'required|email|unique:participantes,email',
            'dataNasc' => 'required|date',
            'senha' => 'required|min:6',
        ]);

        // Criando o registro no banco de dados
        $participante = Participante::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'dataNasc' => $request->dataNasc,
            'senha' => bcrypt($request->senha) //criptografia da senha
        ]);

        Auth::guard('participante')->login($participante);

        return redirect()->route('participante.home')->with('success', 'Cadastro realizado com sucesso!');
    }
}
