<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        // Obter todos os usuários
        $usuarios = \App\Models\User::all();

        // Retornar a view com os dados
        return view('usuarios.index', compact('usuarios'));
    }

    // Exibe o formulário de criação de um novo paciente
    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Verifica se o e-mail é único
            'password' => 'required|string|min:6|confirmed', // Confirmação de senha
        ]);

        // Criação do usuário
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Criptografar a senha
        ]);

        // Redireciona para a lista com mensagem de sucesso
        return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function edit($id)
    {
        // Buscar o usuário pelo ID
        $usuario = User::findOrFail($id);

        // Retornar a view com os dados do usuário
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados enviados pelo formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ]);

        // Buscar o usuário pelo ID
        $usuario = User::findOrFail($id);

        // Atualizar os dados do usuário
        $usuario->update($request->all());

        // Redirecionar com mensagem de sucesso
        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Exclui um paciente
    public function destroy($id)
    {
        $paciente = User::findOrFail($id);

        if ($paciente->usuario_id !== Auth::id()) {
            abort(403, 'Ação não autorizada');
        }

        $paciente->delete();

        return redirect()->route('pacientes.index')->with('sucesso', 'Paciente excluído com sucesso!');
    }
}
