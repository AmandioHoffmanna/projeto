@extends('layouts.app')

@section('title', 'Agenda')

@section('content')
<div class="container mt-5">
    <h1>Agenda</h1>

    @if(auth()->user()->role === 'admin')
    <div class="mb-3">
        <label for="filtroUsuario" class="form-label">Filtrar por Usuário:</label>
        <select id="filtroUsuario" class="form-select">
            <option value="">Todos</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
            @endforeach
        </select>
    </div>
    @endif

    <div id="mensagemVazia" style="display: none; text-align: center;" class="alert alert-info">
        Nenhum compromisso encontrado.
    </div>

    <div id="calendario"></div>
</div>

<!-- Modal para adicionar/editar compromisso -->
<div class="modal fade" id="modalCompromisso" tabindex="-1" aria-labelledby="modalCompromissoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formCompromisso">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCompromissoLabel">Adicionar Compromisso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea id="descricao" name="descricao" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="inicio" class="form-label">Início</label>
                        <input type="datetime-local" id="inicio" name="inicio" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="fim" class="form-label">Fim</label>
                        <input type="datetime-local" id="fim" name="fim" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-danger" id="excluirCompromisso" style="display: none;">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var calendarioEl = document.getElementById('calendario');
    var mensagemVaziaEl = document.getElementById('mensagemVazia');

    var calendario = new FullCalendar.Calendar(calendarioEl, {
        initialView: 'dayGridMonth',
        locale: 'pt-br',
        events: '/agenda/eventos',
        editable: true,
        eventSourceSuccess: function (content) {
            mensagemVaziaEl.style.display = content.length === 0 ? "block" : "none";
            return content;
        },
        dateClick: function (info) {
            console.log("Data clicada:", info.dateStr);

            var modalElement = document.getElementById('modalCompromisso');
            var modal = new bootstrap.Modal(modalElement);
            modal.show();

            document.getElementById('formCompromisso').reset();
            document.getElementById('inicio').value = info.dateStr + 'T00:00'; // Preenche a data no modal
        },
        eventClick: function (info) {
            console.log("Evento clicado:", info.event);

            var modalElement = document.getElementById('modalCompromisso');
            var modal = new bootstrap.Modal(modalElement);
            modal.show();

            document.getElementById('titulo').value = info.event.title;
            document.getElementById('descricao').value = info.event.extendedProps.description || '';
            document.getElementById('inicio').value = info.event.start.toISOString().slice(0, 16);
            document.getElementById('fim').value = info.event.end ? info.event.end.toISOString().slice(0, 16) : '';
            document.getElementById('excluirCompromisso').style.display = "block";
        },
        eventDrop: function (info) {
            atualizarCompromisso(info.event);
        },
        eventResize: function (info) {
            atualizarCompromisso(info.event);
        }
    });

    calendario.render();

    document.getElementById('formCompromisso').addEventListener('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var isEdit = document.getElementById('excluirCompromisso').style.display === "block";
        var url = isEdit ? `/agenda/editar/${formData.get('id')}` : '/agenda/criar';

        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Sucesso:', data);
            var modalElement = document.getElementById('modalCompromisso');
            var modal = bootstrap.Modal.getInstance(modalElement);
            modal.hide();
            calendario.refetchEvents();
        })
        .catch(error => {
            console.error('Erro:', error);
        });
    });
});
</script>
@endpush
