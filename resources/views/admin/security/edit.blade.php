@extends('layout')
@section('title', 'Alterar Senha')
@section('conteudo')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/edit.css') }}">
@endpush

    <div class="change-password-wrapper">
        <div class="form-container">
            <h2>Alterar Senha</h2>

            @if (session('status'))
                @if (Str::contains(session('status'), 'incorreta'))
                    <div class="status-message error">
                        {{ session('status') }}
                    </div>
                @else
                    <div class="status-message success">
                        {{ session('status') }}
                    </div>
                @endif
            @endif

            <form method="POST" action="{{ route('admin.seguranca.update') }}">
                @csrf

                <div class="form-group">
                    <label for="current_password">Senha Atual</label>
                    <input id="current_password" name="current_password" type="password" required>
                    @error('current_password')
                        <span class="validation-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password">Nova Senha</label>
                    <input id="new_password" name="new_password" type="password" required>
                    @error('new_password')
                        <span class="validation-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Confirmar Nova Senha</label>
                    <input id="new_password_confirmation" name="new_password_confirmation" type="password" required>
                </div>

                <button type="submit" class="btn-submit">Salvar nova senha</button>
            </form>
        </div>
    </div>

@endsection
