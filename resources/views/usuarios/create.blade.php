@extends('layouts.app')

@section('title', 'Adicionar Usuário')

@section('content')
<div class="d-flex justify-content-center align-items-start vh-100" style="padding-top: 2rem;">
    <div class="card shadow-lg" style="width: 30rem;">
        <div class="card-header bg-success text-white text-center">
            <h2>Adicionar Novo Usuário</h2>
        </div>
        <div class="card-body">
            <!-- Exibição de erros -->
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

            <!-- Formulário de criação -->
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome completo" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Digite a senha" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirme a Senha</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirme a senha" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4">Salvar</button>
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