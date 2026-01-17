@extends('layout')
@section('title', 'Editar Usuário')
@section('conteudo')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/admin/createUser.css') }}">
    @endpush

    <div class="user-create-wrapper">
        <div class="form-container">
            <h2>Editar Usuário: {{ $user->name }}</h2>

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nome completo</label>
                    <input type="text" id="name" name="name" placeholder="Ex: João Silva" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                    <span class="validation-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="usuario@email.com" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <span class="validation-error">{{ $message }}</span>
                    @enderror
                </div>
                @if(Auth::id() !== $user->id)
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="can_manage_users" value="1" {{ old('can_manage_users', $user->can_manage_users) ? 'checked' : '' }}>
                            <span>Pode gerenciar usuários</span>
                        </label>
                        @error('can_manage_users')
                        <span class="validation-error">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                <div class="form-group">
                    <label for="password">Senha</label>
                    <div class="password-input">
                        <input type="password" id="password" name="password" placeholder="Deixe em branco para não alterar">
                        <button type="button" id="togglePassword">
                            <span class="material-icons">visibility</span>
                        </button>
                    </div>
                    @error('password')
                    <span class="validation-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar senha</label>
                    <div class="password-input">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               placeholder="Repita a senha apenas se for alterar">
                        <button type="button" id="togglePasswordConfirmation">
                            <span class="material-icons">visibility</span>
                        </button>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Atualizar Usuário</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
@push('scripts')
<script>
    document.getElementById('togglePassword').addEventListener('mousedown', function (e) {
        e.preventDefault();
        const input = document.getElementById('password');
        const icon = this.querySelector('.material-icons');
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility';
        }
    });

    document.getElementById('togglePasswordConfirmation').addEventListener('mousedown', function (e) {
        e.preventDefault();
        const input = document.getElementById('password_confirmation');
        const icon = this.querySelector('.material-icons');
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility';
        }
    });
</script>
@endpush
