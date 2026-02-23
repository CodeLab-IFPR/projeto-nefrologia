@push('styles')
    <link rel="stylesheet" href="{{ asset('css/videos.css') }}">
@endpush
@extends('layout')
@section('title', 'Vídeos')
@section('description', 'Explore nossa biblioteca de vídeos educativos sobre nefrologia, cuidados com a fístula e orientações para o tratamento renal.')
@section('keywords', 'vídeos, tutoriais, saúde renal, orientações nefrologia, vídeos educativos')
@section('conteudo')
   <div class="row container" id="home-container">
    @foreach ($videos as $video)
        <div class="col s12 m6 l4 xl3" id="video">
            <a href="{{ route('video.details', $video->slug) }}">
                <div class="video-card">
                    <div class="video-thumb">
                        <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}">
                    </div>

                    <div class="video-textos">
                        <h6 class="video-titulo">
                            {{ $video->title }}
                        </h6>
                        <p class="video-desc">
                            {{ Str::limit($video->description, 115, '...') }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="row center" id="pagination-container">
    {{ $videos->links('custom.pagination') }}
</div>
@endsection


