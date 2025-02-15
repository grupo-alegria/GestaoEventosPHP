<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Ingresso;
use App\Models\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    public function show(Request $request, $id)
    {
        $eventos = Evento::all(); // Busca todos os eventos
        $participante = Participante::findOrFail($id);

        if (!$participante) {
            return redirect()->back()->with('error', 'Participante não encontrado.');
        }

        return view('eventos.index.eventos', compact('eventos', 'participante'));
    }

    public function index(Request $request, $id)
    {
        $eventos = Evento::all(); // Busca todos os eventos
        $participante = Participante::findOrFail($id);

        if (!$participante) {
            return redirect()->back()->with('error', 'Participante não encontrado.');
        }

        return view('eventos.index.eventos', compact('eventos', 'participante'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'tipo' => 'required|in:Show,Festas,Campeonatos esportivos,Outros',
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
            'tipo' => $request->tipo,
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
                'tipo' => $request->tipo,
                'valor' => $request->valor,
                'participante_id' => null,
            ]);
        }

        $eventos = Evento::with('ingressos')->get();


        return redirect()->route('organizador.home', compact('eventos'))->with('success', 'Evento criado com sucesso!');
    }


    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados (opcional, mas recomendado)
        $request->validate([
            'nome' => 'required|min:3',
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'data' => 'required|date',
        ]);

        // Busca o evento pelo ID
        $evento = Evento::findOrFail($id);

        // Atualiza os dados do evento
        $evento->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'data' => $request->data,
        ]);

        // Redireciona para a lista de eventos com uma mensagem de sucesso
        return redirect()->route('organizador.home')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $evento = Evento::find($id);

        if ($evento) {
            Ingresso::where('evento_id', $evento->id)->delete();

            $evento->delete();

            return redirect()->route('organizador.home')->with('success', 'Evento excluído com sucesso!');
        }

        return redirect()->route('organizador.home')->with('error', 'Evento não encontrado.');
    }

    public function ingressos()
    {
        return $this->hasMany(Ingresso::class);
    }
}
