@extends('layout')
@section('title', 'Vídeo')
@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="video-container">
                <iframe width="853" height="480" src="{{ $video->link }}" title="{{ $video->title }}" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col s12">
            <h4 class="blue-text text-darken-2">{{ $video->title }}</h4>
            <p class="grey-text text-darken-1">{{ $video->description }}</p>
        </div>
    </div>
</div>
@endsection
