<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
</body>
</html>
