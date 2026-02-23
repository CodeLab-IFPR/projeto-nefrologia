@extends('layout')
@section('title', 'Gerenciar Usuários')
@section('conteudo')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/admin/indexUser.css') }}">
    @endpush

    <div class="container" id="user-container">
        {{-- CABEÇALHO DA PÁGINA --}}
        <div class="row">
            <div class="col s8 m10">
                <h4>Gerenciar Usuários</h4>
            </div>
            <div class="col s4 m2 right-align">
                <span id="user-count" class="chip blue white-text">{{ $users->count() }} usuários</span>
            </div>
        </div>

        {{-- MENSAGENS DE SUCESSO E ERRO --}}
        @if (session('success'))
            <div class="card-panel green lighten-4 green-text text-darken-4">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="card-panel red lighten-4 red-text text-darken-4">{{ session('error') }}</div>
        @endif

        {{-- BOTÃO PARA ADICIONAR NOVO USUÁRIO --}}
        <a id="create-user" class="waves-effect waves-light btn blue"
           href="{{ route('admin.users.create') }}">
            <i class="material-icons left">person_add</i>Adicionar Novo Usuário
        </a>

        {{-- TABELA DE USUÁRIOS --}}
        <div class="responsive-table">
            <table class="striped highlight table">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th id="action-th" class="center-align">Ações</th>
                </tr>
                </thead>
                <tbody class="responsive-table-body">
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="center-align">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                               class="btn-floating waves-effect waves-light blue">
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="#delete-{{ $user->id }}"
                               class="btn-floating modal-trigger waves-effect waves-light orange darken-2">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum usuário cadastrado.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($users as $user)
        <div id="delete-{{ $user->id }}" class="modal" style="width: 400px; border-radius: 8px;">
            <div class="modal-content" style="padding: 20px;">
                <h5 style="margin-top: 0; margin-bottom: 8px;">
                    <i class="material-icons left orange-text text-darken-2">warning</i>
                    Confirmar Exclusão
                </h5>
                <p class="grey-text">Deseja realmente excluir o usuário <b>{{ $user->name }}</b>?</p>
            </div>
            <div class="modal-footer" style="padding: 4px 20px 20px;">
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <a href="#!" class="modal-close btn-flat grey-text">Cancelar</a>
                    <button type="submit" class="btn-flat orange white-text text-darken-2">Excluir</button>
                </form>
            </div>
        </div>
    @endforeach

@endsection
