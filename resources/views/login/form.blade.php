@extends('layout')
@section('title', 'Login')
@section('conteudo')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login/form.css') }}">
@endpush

    <div class="login-wrapper">
        <div class="login-card">
            <h2 class="login-title">Painel Administrativo</h2>
            <p class="login-subtitle">Faça login para continuar</p>

            @if ($mensagem = Session::get('erro'))
                <div class="alert alert-error">
                    {{ $mensagem }}
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $erro)
                    <div class="alert alert-error">
                        {{ $erro }}
                    </div>
                @endforeach
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login.auth') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input id="email" type="email" name="email" placeholder="Digite seu e-mail"
                        value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <div class="password-input">
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                        <button type="button" id="togglePassword">
                            <span class="material-icons">visibility</span>
                        </button>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>

                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">Esqueci minha senha</a>
                </div>
            </form>
        </div>
    </div>
    
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
    </script>

@endsection
