@extends('layouts.app')

@section('title', 'Lista de Pacientes')

@section('content')
<div class="container mt-5">
    <h1>Pacientes Cadastrados</h1>

    <!-- Exibição de mensagens de sucesso -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Botão para adicionar novos pacientes -->
    <div class="mb-3 text-end">
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">Adicionar Novo Paciente</a>
    </div>

    <!-- Tabela de pacientes -->
    <table class="table table-bordered table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Data de Cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->id }}</td>
                <td>{{ $paciente->usuario->name }}</td>
                <td>{{ $paciente->usuario->email }}</td>
                <td>{{ $paciente->usuario->telefone ?? 'Não informado' }}</td>
                <td>{{ $paciente->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este paciente?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Nenhum paciente cadastrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Botão para retornar -->
    <div class="mt-3">
        <a href="{{ route('home') }}" class="btn btn-secondary">Retornar</a>
    </div>
</div>
@endsection

@push('styles')
<!-- Adicionar estilos específicos para esta página -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
