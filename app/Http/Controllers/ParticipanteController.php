<?php

namespace App\Http\Controllers;

use App\Models\Evento;
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

    public function edit()
    {
        $participante = Auth::guard('participante')->user();

        if (!$participante) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para acessar essa página.');
        }
        return view('participante.edit.editParticipante', compact('participante'));
    }

    public function update(Request $request, $id)
    {
        // Busca o participante pelo ID
        $participante = Participante::findOrFail($id);

        // Verifica se o participante autenticado é o mesmo que está sendo atualizado
        if (Auth::guard('participante')->id() !== $participante->id) {
            return redirect()->route('participante.home')->with('error', 'Você não tem permissão para atualizar este perfil.');
        }

        // Validação dos dados
        $request->validate([
            'nome' => 'required|min:3',
            'cpf' => ['nullable', 'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'],
            'email' => 'required|email|unique:participantes,email,' . $participante->id,
            'dataNasc' => 'required|date',
            'senha' => 'nullable|min:6',
        ]);

        // Atualiza os dados
        $participante->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'dataNasc' => $request->dataNasc,
            'senha' => $request->senha ? bcrypt($request->senha) : $participante->senha, // Atualiza a senha apenas se for fornecida
        ]);

        return redirect()->route('participante.home')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $participante = Participante::findOrFail($id);
        $participante->delete();

        return redirect()->route('home')->with('success', 'Conta excluída com sucesso.');
    }

    public function comprarIngresso($eventoId, $participanteId)
    {
        $ingressoExistente = Ingresso::where('evento_id', $eventoId)
            ->where('participante_id', $participanteId)
            ->exists();

        if ($ingressoExistente) {
            return redirect()->back()->with('error', 'Você já possui um ingresso para este evento.');
        }

        $ingresso = Ingresso::where('evento_id', $eventoId)
            ->whereNull('participante_id')
            ->first();

        if (!$ingresso) {
            return redirect()->back()->with('error', 'Não há ingressos disponíveis para este evento.');
        }

        $ingresso->participante_id = $participanteId;
        $ingresso->save();

        return redirect()->route('participante.home')->with('success', 'Ingresso comprado com sucesso!');
    }

    public function cancelarIngresso($id, $participanteId)
    {
        // Buscar o ingresso pelo ID
        $ingresso = Ingresso::find($id);

        if (!$ingresso) {
            return redirect()->back()->with('error', 'Ingresso não encontrado.');
        }

        // Definir participante_id como NULL para "liberar" o ingresso
        $ingresso->participante_id = null;
        $ingresso->status = 'Não pago';
        $ingresso->save();

        return redirect()->back()->with('success', 'Ingresso cancelado com sucesso.');
    }

    public function pagarIngresso($id)
    {
        $ingresso = Ingresso::findOrFail($id);
        $ingresso->status = 'Pago';
        $ingresso->save();

        return redirect()->back()->with('success', 'Ingresso marcado como pago!');
    }
}
