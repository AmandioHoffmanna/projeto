@extends('layouts.app')

@section('title', 'Relatórios')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Relatórios de Consultas</h2>
    
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($consulta->created_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ $consulta->descricao }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Nenhuma consulta encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
