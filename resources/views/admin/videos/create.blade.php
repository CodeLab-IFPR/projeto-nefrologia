@extends('layout')
@section('title', 'Editar Vídeo')
@section('conteudo')

@include('admin.videos.form', [
    'isEdit' => false,
    'formAction' => route('admin.videos.store')
])

@endsection