@extends('layout') {{-- Usando seu layout principal por enquanto --}}

@section('title', 'Alterar Senha')

@section('conteudo')

<div class="container" style="margin-top: 40px; margin-bottom: 40px;">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            
            {{-- Usando o card do Materialize para agrupar o formulário --}}
            <div class="card-panel">
                <h4 class="center-align">Alterar Minha Senha</h4>

                {{-- Bloco para exibir a mensagem de SUCESSO --}}
                @if (session('success'))
                    <div class="card-panel green lighten-4 green-text text-darken-4">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Bloco para exibir a mensagem de ERRO GERAL (se usarmos) --}}
                @if (session('error'))
                     <div class="card-panel red lighten-4 red-text text-darken-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="row">
                    <form class="col s12" method="POST" action="{{ route('admin.seguranca.update') }}">
                        @csrf
                        <div class="row">

                            {{-- CAMPO SENHA ATUAL --}}
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock_open</i>
                                <input id="current_password" name="current_password" type="password" required>
                                <label for="current_password">Senha Atual</label>
                                @error('current_password')
                                    {{-- Exibe o erro específico da senha atual incorreta --}}
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- CAMPO NOVA SENHA --}}
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="new_password" name="new_password" type="password" required>
                                <label for="new_password">Nova Senha</label>
                                @error('new_password')
                                    {{-- Exibe erros de validação (ex: menos de 8 caracteres) --}}
                                    <span class="helper-text red-text">As senhas não coincidem</span>
                                @enderror
                            </div>

                            {{-- CAMPO CONFIRMAÇÃO DA NOVA SENHA --}}
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="new_password_confirmation" name="new_password_confirmation" type="password" required>
                                <label for="new_password_confirmation">Confirme a Nova Senha</label>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button class="btn waves-effect waves-light red lighten-1 right" type="submit">
                                    Salvar Nova Senha
                                    <i class="material-icons right">save</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection