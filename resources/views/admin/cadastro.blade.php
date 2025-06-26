@extends('layout')
@section('title', 'Cadastro')
@section('conteudo')
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            margin: 40px auto;
        }

        .custom-form {
            background-color: #f5f5f5;
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .message-box {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 6px;
            font-size: 14px;
            text-align: center;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .error-message {
            background-color: #ffebee;
            color: #d32f2f;
            border: 1px solid #d32f2f;
        }

        .success-message {
            background-color: #e8f5e9;
            color: #388e3c;
            border: 1px solid #388e3c;
        }

        .input-field input {
            position: relative;
            z-index: 1;
        }
    </style>

    {{-- Exibe mensagens de erro --}}
    @if ($errors->any())
        <div class="message-box error-message">
            <ul style="list-style: none; padding: 0; margin: 0;">
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

    <div class="form-container">
        <div class="custom-form">
            <form class="col s12" method="post" action="{{ route('admin.cadastro.post') }}">
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
                        <button class="btn waves-effect waves-light #ef5350 red lighten-1" type="submit" name="action">
                            Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
