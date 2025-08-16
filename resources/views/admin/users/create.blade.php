@extends('layout')
@section('title', 'Cadastrar Novo Usuário')
@section('conteudo')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/createUser.css') }}">
@endpush

    <div class="user-create-wrapper">
        <div class="form-container">
            <h2>Cadastrar Novo Usuário</h2>

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nome completo</label>
                    <input type="text" id="name" name="name" placeholder="Ex: João Silva" value="{{ old('name') }}"
                        required>
                    @error('name')
                        <span class="validation-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="usuario@email.com"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <span class="validation-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" placeholder="Crie uma senha" required>
                    @error('password')
                        <span class="validation-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar senha</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Repita a senha" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
