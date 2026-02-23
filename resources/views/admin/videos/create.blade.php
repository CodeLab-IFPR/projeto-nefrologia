@extends('layout')
@section('title', 'Cadastrar Vídeo')
@section('conteudo')

@include('admin.videos.form', [
    'isEdit' => false,
    'formAction' => route('admin.videos.store')
])

@endsection
