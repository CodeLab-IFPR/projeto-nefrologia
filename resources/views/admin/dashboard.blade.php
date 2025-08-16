@extends('layout')
@section('title', 'Painel Administrativo')
@section('conteudo')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endpush

    <div class="container panel-wrapper">

        {{-- Título da Página --}}
        <div class="row">
            <div class="col s12">
                <h3>Painel Administrativo</h3>
                <p class="flow-text">Bem-vindo, {{ auth()->user()->name }}!</p>
            </div>
        </div>

        {{-- Grid com os Cards de Funções --}}
        <div class="row">

            {{-- Card: Gerenciar Vídeos --}}
            <div class="col s12 m6 l3 panel-card-col">
                <a href="{{ route('admin.videos.index') }}" class="panel-card">
                    <i class="material-icons">video_library</i>
                    <span>Gerenciar Vídeos</span>
                </a>
            </div>

            {{-- Card: Cadastrar Usuário --}}
            <div class="col s12 m6 l3 panel-card-col">
                <a href="{{ route('admin.users.create') }}" class="panel-card">
                    <i class="material-icons">person_add</i>
                    <span>Cadastrar Usuário</span>
                </a>
            </div>


            {{-- Card: Alterar Senha --}}
            <div class="col s12 m6 l3 panel-card-col">
                <a href="{{ route('admin.seguranca.edit') }}" class="panel-card">
                    <i class="material-icons">lock</i>
                    <span>Alterar Senha</span>
                </a>
            </div>

            {{-- Card: Sair --}}
            <div class="col s12 m6 l3 panel-card-col">
                <a href="{{ route('login.logout') }}" class="panel-card">
                    <i class="material-icons">exit_to_app</i>
                    <span>Sair</span>
                </a>
            </div>

        </div>
    </div>

@endsection
