@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js\home.js') }}"></script>
@endpush
@extends('layout')
@section('title', 'Home')
@section('conteudo')
    <div class="container top-section">
        <div class="grid">
            <div class="grid-item" name="titulo">
                <div class="title-image"></div>
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
                    @if ($showcaseVideo)
                        <iframe src="{{ $showcaseVideo->link }}" title="{{ $showcaseVideo->title }}"
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
                    {{-- <button class="btn btn-primary" onclick="window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });">
                        <span class="material-symbols-outlined">favorite</span>
                        Saiba mais
                    </button> --}}
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
                            <span class="material-symbols-outlined">play_circle</span>
                        </div>
                        <div class="stat-title">{{ $nearestMultipleOfFive }}+ Vídeos</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">healing</span>
                        </div>
                        <div class="stat-title">Foco no Cuidado</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <span class="material-symbols-outlined">favorite</span>
                        </div>
                        <div class="stat-title">100% de Apoio</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container carousel">
        <div class="carousel-header">
            <h2 class="carousel-title">Conheça Nossos Vídeos</h2>
            <div class="carousel-controls">
                <button class="btn carousel swiper-button-prev"></button>
                <button class="btn carousel swiper-button-next"></button>
            </div>
        </div>

        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($videos as $video)
                    <div class="swiper-slide carousel-video">
                        <div class="video-card">
                            <iframe src="{{ $video->link }}" title="{{ $video->title }}" allowfullscreen>
                            </iframe>
                            <div class="carousel-video-title">{{ $video->title }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="swiper-pagination"></div>
    </div>
@endsection
