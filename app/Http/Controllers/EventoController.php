<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Ingresso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    public function index()
    {
        return view('eventos.auth.cadastroEventos');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|in:Show,Festas,Campeonatos esportivos,Outros',
            'data' => 'required|date',
            'valor' => 'required|numeric|min:0',
            'local' => 'required|string',
            'descricao' => 'required|string|max:1000',
            'lotacaoMax' => 'required|integer|min:1',
        ]);

        $organizador = Auth::guard('organizador')->user();

        if (!$organizador) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para criar um evento.');
        }

        $evento = Evento::create([
            'nome' => $request->nome,
            'data' => $request->data,
            'valor' => $request->valor,
            'local' => $request->local,
            'descricao' => $request->descricao,
            'lotacaoMax' => $request->lotacaoMax,
            'organizador_id' => $organizador->id,
        ]);

        for ($i = 1; $i <= $request->lotacaoMax; $i++) {
            Ingresso::create([
                'evento_id' => $evento->id,
                'tipo' => $request->nome,
                'valor' => $request->valor,
                'participante_id' => null,
            ]);
        }

        $eventos = Evento::with('ingressos')->get();


        return redirect()->route('organizador.home', compact('eventos'))->with('success', 'Evento criado com sucesso!');
    }


    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'tipo' => 'required|string|in:Show,Festas,Campeonatos esportivos,Outros',
            'data' => 'required|date',
            'valor' => 'required|numeric|min:0',
            'local' => 'required|string',
            'descricao' => 'required|string|max:255',
            'lotacaoMax' => 'required|integer|min:1',
            'organizador_id' => 'required|exists:organizadors,id',
        ]);

        $evento->update($request->all());

        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento excluído com sucesso!');
    }

    public function ingressos()
    {
        return $this->hasMany(Ingresso::class);
    }
}
