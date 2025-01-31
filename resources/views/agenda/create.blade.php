@extends('layouts.app')

@section('title', 'Agendamento de Pacientes')

@section('content')
<div class="container mt-5">
    <h1>Agendamento de Pacientes</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('agendamento.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data_horario" class="form-label">Data e Horário</label>
            <input type="datetime-local" name="data_horario" id="data_horario" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Agendar</button>
        <br>
        <button type="button" class="btn return"><a href="{{ route('home') }}">Retornar</a></button>
    </form>
</div>
@endsection

@push('styles')
<!-- Adicionar estilos específicos para esta página -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush