@extends('layout')
@section('title', 'Cadastrar Novo Usuário')
@section('conteudo')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .user-create-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 40px 15px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            

        }
        .form-container h2 {
            color: rgb(24, 123, 205);
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 600;
            text-align: center;
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

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }


        .form-actions .btn {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
            text-transform: none;

        }

        .btn-primary {
            background-color: rgb(24, 123, 205);
            color: white;
        }

        .btn-primary:hover {
            background-color: rgb(20, 103, 175);
        }

        .btn-secondary {
            background-color: #e9ecef;
            color: #495057;
        }

        .btn-secondary:hover {
            background-color: #d6dbe0;
        }


        .validation-error {
            color: #dc3545;
            font-size: 0.875em;
            display: block;
            margin-top: 5px;
        }
    </style>

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
