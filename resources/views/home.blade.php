@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
@extends('layout')
@section('title', 'Home')
@section('conteudo')
    <div class="row container">
        @foreach ($videos as $video)
            <div class="col s12 m3" style="margin-top: 30px;">
                <div class="card" style="height: 350px;"> <!-- Altura fixa para todos os cards -->
                    <div class="card-image" style="height: 180px; overflow: hidden;">
                        <img src="{{ $video->thumbnail }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="card-content" style="height: 100px; overflow: hidden;">
                        <span class="card-title"
                            style="color: #ef5350; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7); font-size: 20px; margin-top: -30px; margin-left: -15px; font-weight: 600;">
                            {{ $video->title }}
                        </span>

                        <p style="font-size: 14px;">{{ $video->description }}</p>
                    </div>

                    <div class="card-action" style="height: 40px;">
                        <a href="{{ route('video.details', $video->slug) }}">Acesse o vídeo</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row center">
        {{ $videos->links('custom.pagination') }}
    </div>
@endsection