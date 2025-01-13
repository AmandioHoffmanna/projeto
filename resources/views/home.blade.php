@extends('layouts.app')

@section('title', 'Consultório de Nutrição')

@section('content')
    <section class="hero">
        <h1>Cuidando da Sua Saúde</h1>
        <p>Organize seu consultório de maneira prática e eficiente.</p>
    </section>

    <div class="container">
        <section class="features">
            <div class="feature">
                <img src="/imagens/agenda.png" alt="Agenda">
                <h2><a href="{{ route('agendamento.create') }}">Gerenciamento de Agendas</a></h2>
                <p>Planeje suas consultas com facilidade e evite conflitos de horários.</p>
            </div>
            <div class="feature">
                <img src="/imagens/pacientes.png" alt="Pacientes">
                <h2><a href="{{ route('pacientes.index') }}">Cadastro de Pacientes</a></h2>
                <p>Tenha todas as informações de seus pacientes organizadas e seguras.</p>
            </div>
            <div class="feature">
                <img src="/imagens/relatorio.png" alt="Relatórios">
                <h2><a href="{{ route('relatorios') }}">Relatórios Detalhados</a></h2>
                <p>Visualize e analise dados importantes do consultório.</p>
            </div>
        </section>
    </div>
@endsection