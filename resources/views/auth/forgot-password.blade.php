@extends('layout')
@section('title', 'Recuperar Senha')
@section('conteudo')

    {{-- O CSS pode ficar aqui para ser aplicado apenas nesta página --}}
    <style>
        .recovery-page-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 80vh;
            /* Ocupa a maior parte da tela */
        }

        /* Container principal do formulário */
        .recovery-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        /* Título do formulário */
        .recovery-title {
            color: rgb(24, 123, 205);
            font-size: 24px;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 25px;
        }

        /* Campo de e-mail */
        .email-input {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Estilos do botão e outros (mantidos do seu código) */
        .email-input::placeholder {
            color: #aaaaaa;
        }

        .email-input:focus {
            outline: none;
            border-color: rgb(24, 123, 205);
            box-shadow: 0 0 0 2px rgba(24, 123, 205, 0.2);
        }

        .submit-button {
            width: 100%;
            padding: 15px;
            background-color: rgb(24, 123, 205);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: rgb(20, 103, 175);
        }

        /* Estilos para as mensagens */
        .status-message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-weight: 500;
        }

        .status-message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .status-message.error {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Para o erro de e-mail não encontrado */
        .validation-error {
            color: #721c24;
            font-size: 14px;
            margin-top: -15px;
            margin-bottom: 10px;
            display: block;
            text-align: left;
        }
    </style>

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
