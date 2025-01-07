<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('agendamento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:15',
            'data_horario' => 'required|date|after_or_equal:today',
        ]);

        Appointment::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'data_horario' => $request->data_horario,
        ]);

        return redirect()->route('agendamento.create')->with('success', 'Agendamento realizado com sucesso!');
    }
}
