@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
@extends('layout')
@section('title', 'Home')
@section('conteudo')
    <div class="container">
        <div class="grid">
            <div class="grid-item" name="titulo">
                <h1 class="grid-title">Bem-vindo ao ConectaRim</h1>
            </div>

            <div class="grid-item" name="descricao">
                <p class="grid-description">
                    Aqui você encontrará informações confiáveis, vídeos educativos e materiais 
                    para ajudar no entendimento do tratamento de hemodiálise. Nosso objetivo é 
                    oferecer conhecimento acessível e apoio a pacientes e familiares.
                </p>
            </div>

            <div class="grid-item" name="video">
                <div class="grid-video-container">
                    @if($showcaseVideo)
                    <iframe
                        src="{{ $showcaseVideo->link }}"
                        title="{{ $showcaseVideo->title }}"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                    @else
                        <div class="video-placeholder">
                            Nenhum vídeo em destaque
                        </div>                    
                    @endif
                </div>
            </div>

            <div class="grid-item" name="botoes">
                <div class="item-buttons">
                    <button class="btn btn-primary" onclick="window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });">
                        <span class="material-symbols-outlined">favorite</span>
                        Saiba mais
                    </button>
                    <a href="{{ route('videos.index') }}" class="btn btn-outline">
                        <span class="material-symbols-outlined">video_library</span>
                        Ver mais vídeos
                    </a>
                </div>
            </div>

            <div class="grid-item" name="stats">
                <div class="grid-stats">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">groups</span>
                        </div>
                        <div class="stat-number">1000+</div>
                        <div class="stat-label">Pacientes Ajudados</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">play_circle</span>
                        </div>
                        <div class="stat-number">{{ $nearestMultipleOfFive }}+</div>
                        <div class="stat-label">Vídeos Educativos</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">favorite</span>
                        </div>
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Apoio e Cuidado</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection