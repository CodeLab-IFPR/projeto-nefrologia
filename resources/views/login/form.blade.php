@extends('layout')
@section('title', 'Login')
@section('conteudo')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login/form.css') }}">
@endpush

    <div class="form-container">
        <div class="custom-form">
            <!-- Mensagens de Erro / Sessão -->
            @if ($mensagem = Session::get('erro'))
                <div class="error-message">
                    {{ $mensagem }}
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $erro)
                    <div class="error-message">
                        {{ $erro }}
                    </div>
                @endforeach
            @endif
            @if (session('status'))
                <div class="status-message card-panel green lighten-4 green-text text-darken-4">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login.auth') }}" method="POST">
                @csrf
                <!-- Campo Login -->
                <div class="row ">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">person</i>
                        <input id="email" type="email" name="email" class="validate" placeholder="Insira seu Email"
                            required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <!-- Campo Senha -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="password" type="password" name="password" class="validate"
                            placeholder="Insira sua senha" required>
                        <label for="password">Senha</label>
                    </div>
                </div>
                <div class="RecuperarSenha">
                    <a href="{{ route('password.request') }}">Esqueci minha senha</a>
                </div>
                <!-- Botão Enviar -->
                <div class="row">
                    <div class="col s12 center-align">
                        <button class="btn waves-effect waves-light #ef5350 red lighten-1" type="submit" name="action">
                            Entrar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
