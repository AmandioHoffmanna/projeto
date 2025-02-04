<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Consulta;


class RelatoriosController extends Controller
{
    public function relatorios()
    {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }


        // Buscar todas as consultas de um usuário específico
        $consultas = Consulta::where('usuario_id', Auth::id())->get();

        // Passar os dados para a view
        return view('relatorios.index', compact('consultas'));
    }
}
