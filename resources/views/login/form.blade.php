@extends('layout')
@section('title', 'Login')
@section('conteudo')
<style>
    /* Centraliza o formulário horizontalmente */
    .form-container {
        display: flex;
        justify-content: center;
        margin: 40px auto; /* Espaço superior e inferior reduzido */
    }
    /* Formulário com container menor */
    .custom-form {
        background-color: #f5f5f5;
        padding: 10px 15px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
    }
    /* Ícones menores */
    .custom-form i.material-icons.prefix {
        font-size: 16px;
    }
    /* Botão com ícone menor */
    .custom-form button i.material-icons.right {
        font-size: 16px;
    }
    /* Mensagens de erro */
    .error-message {
        background-color: #ffebee;
        color: #c62828;
        padding: 8px;
        border-radius: 4px;
        margin-bottom: 10px;
    }
</style>

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

        <form action="{{ route('login.auth') }}" method="POST">
            @csrf
            <!-- Campo Login -->
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input id="login" type="text" name="login" class="validate" placeholder="Insira seu login" required>
                    <label for="login">Login</label>
                </div>
            </div>
            <!-- Campo Senha -->
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" type="password" name="password" class="validate" placeholder="Insira sua senha" required>
                    <label for="password">Senha</label>
                </div>
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
