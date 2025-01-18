@extends('layouts.app')

@section('title', 'Cadastrar Paciente')

@section('content')
<div class="container mt-5">
    <h1>Cadastrar Paciente</h1>

    <form action="{{ route('pacientes.salvar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>
        <div class="mb-3">
            <label for="data_cadastro" class="form-label">Data de Cadastro</label>
            <input type="datetime-local" class="form-control" id="data_cadastro" name="data_cadastro">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
