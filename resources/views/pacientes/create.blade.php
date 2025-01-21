@extends('layouts.app')

@section('title', 'Selecionar Usuário')

@section('content')
<div class="container mt-5">
    <h1>Selecionar Usuário para Associar como Paciente</h1>

    <!-- Exibição de mensagens de erro -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Tabela de usuários -->
    <table class="table table-bordered table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    <form action="{{ route('pacientes.associarUsuario') }}" method="POST">
                        @csrf
                        <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
                        <button type="submit" class="btn btn-success btn-sm">Associar como Paciente</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Todos os usuários já são pacientes ou não há usuários disponíveis.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Botão para retornar -->
    <div class="mt-3">
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Voltar para Lista de Pacientes</a>
    </div>
</div>
@endsection

@push('styles')
<!-- Adicionar estilos específicos para esta página -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush