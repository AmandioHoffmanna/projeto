@extends('layouts.app')

@section('title', 'Consultório de Nutrição')

@section('content')
    <div class="container">
        <section class="carousel-section">
            <!-- Texto acima do carrossel -->
            <div class="text-center mb-4">
                <h2>Bem-vindo ao NutriClinic</h2>
                <p>Nosso sistema facilita a organização de agendamentos, relatórios e informações dos seus pacientes.</p>
            </div>

            <!-- Carrossel com tamanho ajustado -->
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="max-width: 1000px; margin: 0 auto;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="imagens/agenda.png" class="d-block w-100" alt="Slide 1" style="height: 300px; object-fit: contain;">
                            </div>
                            <div class="col-md-4">
                                <img src="imagens/img_lorem.png" class="d-block w-100" alt="Slide 2" style="height: 300px; object-fit: contain;">
                            </div>
                            <div class="col-md-4">
                                <img src="imagens/relatorio.png" class="d-block w-100" alt="Slide 3" style="height: 300px; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="imagens/img_lorem.png" class="d-block w-100" alt="Slide 4" style="height: 300px; object-fit: contain;">
                            </div>
                            <div class="col-md-4">
                                <img src="imagens/agenda.png" class="d-block w-100" alt="Slide 5" style="height: 300px; object-fit: contain;">
                            </div>
                            <div class="col-md-4">
                                <img src="imagens/img_lorem.png" class="d-block w-100" alt="Slide 6" style="height: 300px; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Texto abaixo do carrossel -->
            <div class="text-center mt-4">
                <h3>Comece Agora Mesmo</h3>
                <p>Explore as funcionalidades do sistema para gerenciar seu consultório de forma rápida e eficaz.</p>
            </div>
        </section>
    </div>
@endsection
