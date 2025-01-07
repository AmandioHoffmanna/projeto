<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultório de Nutrição</title>
    <link rel="stylesheet" href="{{ asset('css/styleHome.css') }}">
    <script src="{{ asset('js/jsHome.js') }}" defer></script>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gestão NutriClinic</h1>
    </header>

    <nav>
        <button class="hamburger" id="hamburger">☰</button>
        <ul class="menu" id="menu">            
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('agendamento.create') }}">Agendamentos</a></li>
            <li><a href="{{ route('pacientes.index') }}">Pacientes</a></li>
            <li><a href="{{ route('relatorios') }}">Relatórios</a></li>
            <li><a href="{{ route('configuracao')}}">Configurações</a></li>
        </ul>
    </nav>

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

    <footer>
        <p>&copy; 2025 NutriClinic. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
