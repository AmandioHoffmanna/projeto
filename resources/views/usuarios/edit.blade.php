@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
<div class="d-flex justify-content-center align-items-start vh-100" style="padding-top: 2rem;">
    <div class="card shadow-lg" style="width: 30rem;">
        <div class="card-header bg-success text-white text-center">
            <h2>Editar Usuário</h2>
        </div>
        <div class="card-body">
            <!-- Exibição de mensagens de erro -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Por favor, corrija os seguintes erros:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Formulário de edição -->
            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $usuario->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone', $usuario->telefone) }}">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4">Salvar Alterações</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary px-4">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<!-- Adicionar estilos específicos para esta página -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endpush