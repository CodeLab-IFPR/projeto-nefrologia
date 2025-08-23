@extends('layout')
@section('title', 'Vídeo')
@section('conteudo')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/video/details.css') }}">
@endpush

<div class="video-page">
    <div class="video-header">
        <h2 class="video-title">{{ $video->title }}</h2>
    </div>

    <div class="video-wrapper">
        <iframe id="video-iframe" 
            src="{{ $video->link }}" 
            title="{{ $video->title }}" 
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen>
        </iframe>
    </div>

    <div class="video-description">
        <p>{{ $video->description }}</p>
    </div>

    <div class="video-navigation">
        @if($previousVideo)
            <a href="{{ route('video.details', $previousVideo->slug) }}" class="btn-nav btn-prev">
                <span class="icon">←</span> Vídeo Anterior
            </a>
        @else
            <a href="{{ route('user.index') }}" class="btn-nav btn-prev">
                <span class="icon">←</span> Voltar ao Início
            </a>
        @endif

        @if($nextVideo)
            <a href="{{ route('video.details', $nextVideo->slug) }}" class="btn-nav btn-next">
                Próximo Vídeo <span class="icon">→</span>
            </a>
        @else
            <span class="btn-nav btn-next disabled">Próximo Vídeo →</span>
        @endif
    </div>
</div>

@endsection