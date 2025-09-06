@extends('layout')
@section('title', 'Cadastro')
@section('conteudo')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/createVideo.css') }}">
@endpush

    {{-- Exibe mensagens de erro --}}
    @if ($errors->any())
        <div class="message-box error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Exibe mensagem de sucesso --}}
    @if (session('success'))
        <div class="message-box success-message">
            {{ session('success') }}
        </div>
    @endif
{{-- Exibe mensagem de erro da sessão --}}
@if (session('error'))
    <div class="message-box error-message">
        {{ session('error') }}
    </div>
@endif

    <div class="form-container">
        <div class="custom-form">
            <form class="col s12" method="post" action="{{  route('admin.videos.store') }}">
                @csrf
                <!-- Campo Link -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">link</i>
                        <input type="text" name="link" value="{{ old('link') }}" required>
                        <label for="link">Link</label>
                    </div>
                </div>
                <!-- Campo Título -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">title</i>
                        <input id="title" name="title" type="text" class="validate" value="{{ old('title') }}">
                        <label for="title" class="active">Título</label>
                    </div>
                </div>
                {{-- @error('slug')
                    <div class="message-box error-message">
                        <span>{{ $message }}</span>
                    </div> --}}
                <!-- Campo Descrição com textarea -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">description</i>
                        <input id="description" name="description" type="text" class="validate" value="{{ old('description') }}">
                        <label for="description" class="active">Descrição</label>
                    </div>
                </div>
                <!-- Botão Enviar -->
                <div class="row">
                    <div class="col s12 center-align">
                        <button class="btn" type="submit" name="action">
                            Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
