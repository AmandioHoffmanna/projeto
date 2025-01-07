<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    // Exibe a lista de pacientes
    public function index()
    {
        // Buscar todos os agendamentos
        $appointments = Appointment::orderBy('data_horario', 'asc')->get();
        
        // Passar para a view com o nome correto da variável
        return view('pacientes.index', compact('appointments'));
    }

    // Exclui um paciente
    public function destroy($id)
    {
        // Encontrar o paciente pelo ID e excluí-lo
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        // Redirecionar com sucesso
        return redirect()->route('pacientes.index')->with('success', 'Paciente excluído com sucesso!');
    }
}
