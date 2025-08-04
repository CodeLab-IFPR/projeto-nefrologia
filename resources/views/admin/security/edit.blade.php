@extends('layout')

@section('title', 'Alterar Senha')

@section('conteudo')

    <style>
        .change-password-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 40px 15px;

        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        .form-container h2 {
            color: rgb(24, 123, 205);
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 3px rgb(20, 103, 175);
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: rgb(24, 123, 205);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-submit:hover {
            background-color: rgb(20, 103, 175);
        }


        .status-message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-weight: 500;
            text-align: center;
        }

        .status-message.success {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .status-message.error {
            background-color: #f8d7da;
            color: #842029;
        }

        .validation-error {
            color: #dc3545;
            font-size: 0.875em;
            display: block;
            margin-top: 5px;
        }
        body{
            background-color: #f8f9fa
        }
    </style>

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
