@extends('layout')
@section('title', 'Cadastrar Novo Usuário')
@section('conteudo')

<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="row">
        <div class="col s12">
            <h4><i class="material-icons">person_add</i> Cadastrar Novo Usuário</h4>

            @if ($errors->any())
                <div class="card-panel red lighten-4 red-text text-darken-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.store') }}" method="POST" style="margin-top: 20px;">
                @csrf

                <div class="input-field">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                    <label for="name">Nome Completo</label>
                </div>

                <div class="input-field">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    <label for="email">E-mail</label>
                </div>

                <div class="input-field">
                    <input id="password" type="password" name="password" required>
                    <label for="password">Senha</label>
                </div>

                <div class="input-field">
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                    <label for="password_confirmation">Confirmar Senha</label>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
                    <a href="#" class="waves-effect waves-grey btn-flat">Cancelar</a> {{-- Pode apontar para admin.users.index depois --}}
                    <button type="submit" class="waves-effect waves-light btn" style="background-color: #187bcd;">Salvar Usuário</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection