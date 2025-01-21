<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacientesController extends Controller
{
    // Exibe a lista de pacientes
    public function index()
    {
        // Obtenha os pacientes e carregue os dados dos usuários relacionados
        $pacientes = \App\Models\Paciente::with('usuario')->get();

        return view('pacientes.index', compact('pacientes'));
    }


    // Exibe o formulário de criação de um novo paciente
    public function create()
    {
        $usuarios = User::doesntHave('pacientes')->get(); // Filtra usuários que não são pacientes
        return view('pacientes.create', compact('usuarios'));
    }

    public function associarUsuario(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id', // Garante que o ID do usuário existe
        ]);

        Paciente::create([
            'usuario_id' => $request->usuario_id,
        ]);

        return redirect()->route('pacientes.index')->with('success', 'Usuário associado como paciente com sucesso!');
    }

    // public function salvar(Request $request)
    // {
    //     Paciente::create([
    //         'id' => $request->id,
    //         'usuario_id' => Auth::id(),
    //     ]);

    //     return redirect()->route('pacientes.index')->with('sucesso', 'Paciente cadastrado com sucesso!');
    // }

    // Exclui um paciente
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);

        if ($paciente->usuario_id !== Auth::id()) {
            abort(403, 'Ação não autorizada');
        }

        $paciente->delete();

        return redirect()->route('pacientes.index')->with('sucesso', 'Paciente excluído com sucesso!');
    }

}