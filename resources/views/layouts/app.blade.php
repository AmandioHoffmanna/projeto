<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'NutriClinic')</title> {{-- Define o título dinâmico --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CSS Principal -->
    <link rel="stylesheet" href="{{ asset('css/styleHome.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Área para adicionar estilos específicos de cada página -->
    @stack('styles')
</head>

<body class="font-sans antialiased">
    <header>
        <h1>Bem-vindo ao Sistema de Gestão NutriClinic</h1>
    </header>

    <nav>
        <button class="hamburger" id="hamburger">☰</button>
        <ul class="menu" id="menu">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('agenda.index') }}">Agenda</a></li>
            <li><a href="{{ route('pacientes.index') }}">Pacientes</a></li>
            <li><a href="{{ route('usuarios.index') }}">Usuários</a></li>
            <li><a href="{{ route('relatorios') }}">Relatórios</a></li>
            <li><a href="{{ route('configuracao') }}">Configurações</a></li>
        </ul>
        <div class="auth-buttons">
            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn">Sair</button>
            </form>
            @else
            <a href="{{ route('login') }}" class="btn">Login</a>
            @endauth
        </div>
    </nav>

    <div class="min-h-screen bg-gray-100">
        <!-- Conteúdo da Página -->
        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        <p>&copy; 2025 NutriClinic. Todos os direitos reservados.</p>
    </footer>

    <!-- Script Principal -->
    <script src="{{ asset('js/jsHome.js') }}" defer></script>

    <!-- Área para adicionar scripts específicos de cada página -->
    @stack('scripts')
</body>

</html>