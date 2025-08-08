@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
@extends('layout')
@section('title', 'Home')
@section('conteudo')
   <div class="row container" style="margin-top: 40px;">
    @foreach ($videos as $video)
        <div class="col s12 m6 l4 xl3" style="margin-bottom: 40px;">
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

<div class="row center" style="margin-top: 20px;">
    {{ $videos->links('custom.pagination') }}
</div>

<style>
    .video-card {
        display: flex;
        flex-direction: column;
        cursor: pointer;
        height: 320px;
        transition: transform 0.2s ease;
        border-radius: 9px;
        overflow: hidden;
        box-shadow: 0 9px 18px rgba(0,0,0,0.15);
    }

    .video-card:hover {
        transform: translateY(-5px);
    }

    .video-thumb {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; /* pra dar os 16:9 */
    }

    .video-thumb img {
        position: absolute;
        width: 100%; height: 100%;
        object-fit: cover;
    }

    .video-textos {
        padding: 12px;
    }

    .video-titulo {
        color: #1465c0;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 6px;
        line-height: 1.3;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        min-height: 40px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .video-desc {
        font-size: 14px;
        line-height: 1.4;
        color: #555;
        overflow: hidden;
    }

    @media (max-width: 600px) {
        .video-card {
                height: 350px;
        }                    
    }                                       
</style>

@endsection