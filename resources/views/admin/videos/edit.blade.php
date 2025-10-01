@extends('layout')
@section('title', 'Editar Vídeo')
@section('conteudo')

@include('admin.videos.form', [
    'isEdit' => true,
    'video' => $video,
    'formAction' => route('admin.videos.update', $video->id)
])

@endsection