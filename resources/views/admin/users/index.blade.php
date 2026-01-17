@extends('layout')
@section('title', 'Gerenciar Usuários')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4>Gerenciar Usuários</h4>
                <a href="{{ route('admin.users.create') }}" class="btn waves-effect waves-light blue">
                    <i class="material-icons left">person_add</i> Novo Usuário
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <table class="highlight centered responsive-table">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-floating waves-effect waves-light orange">
                                    <i class="material-icons">edit</i>
                                </a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-floating waves-effect waves-light red" onclick="return confirm('Deseja realmente excluir este usuário?')">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
