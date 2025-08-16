@extends('layout')
@section('title', 'Recuperar Senha')
@section('conteudo')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/forgot-password.css') }}">
@endpush

    <div class="recovery-page-wrapper">
        <div class="recovery-container">
            <h2 class="recovery-title">Recuperar Senha</h2>

            @if (session('status'))
                @if (Str::contains(session('status'), 'não está cadastrado'))
                    <div class="status-message error">
                        {{ session('status') }}
                    </div>
                @else
                    <div class="status-message success">
                        {{ session('status') }}
                    </div>
                @endif
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <input type="email" name="email" class="email-input" placeholder="Digite seu e-mail"
                    value="{{ old('email') }}" required>

                @error('email')
                    <div class="validation-error">{{ $message }}</div>
                @enderror

                <button type="submit" class="submit-button">Enviar Nova Senha</button>
            </form>
        </div>
    </div>

@endsection
