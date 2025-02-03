<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('agenda.index', compact('usuarios'));
    }

    public function getEventos(Request $request)
    {
        $query = Agenda::query();

        if (Auth::user()->role === 'subordinado') {
            $query->where('user_id', Auth::id());
        } elseif ($request->usuario_id) {
            $query->where('user_id', $request->usuario_id);
        }

        $compromissos = $query->get();

        // Formatar os compromissos para o FullCalendar
        $eventos = $compromissos->map(function ($compromisso) {
            return [
                'id' => $compromisso->id,
                'title' => $compromisso->titulo,
                'start' => $compromisso->inicio,
                'end' => $compromisso->fim,
                'description' => $compromisso->descricao,
            ];
        });

        return response()->json($eventos);
    }

    public function criar(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'inicio' => 'required|date',
            'fim' => 'required|date|after:inicio',
        ]);

        $compromisso = Agenda::create(array_merge($validated, [
            'user_id' => Auth::id(),
        ]));

        return response()->json($compromisso);
    }

    public function editar(Request $request, $id)
    {
        $compromisso = Agenda::findOrFail($id);

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'inicio' => 'required|date',
            'fim' => 'required|date|after:inicio',
        ]);

        $compromisso->update($validated);

        return response()->json($compromisso);
    }

    public function excluir($id)
    {
        $compromisso = Agenda::findOrFail($id);
        $compromisso->delete();

        return response()->json(['sucesso' => true]);
    }
}
