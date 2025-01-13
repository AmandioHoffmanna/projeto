@extends('layouts.app')

@section('title', 'Lista de Pacientes')

@section('content')
<div class="container mt-5">
    <h1>Pacientes Cadastrados</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Data e Horário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->nome }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->telefone }}</td>
                <td>{{ $appointment->data_horario }}</td>
                <td>
                    <form action="{{ route('pacientes.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este paciente?');">
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
</div>
<br>
<div><button type="button" class="btn return"><a href="{{ route('home') }}">Retornar</a></button></div>
@endsection


@push('styles')
<!-- Adicionar estilos específicos para esta página -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush