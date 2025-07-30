@extends('layout')
@section('title', 'Gerenciar')
@section('conteudo')

    @stack('styles')
    <style>
        .table-responsive {
            margin: 0 1em 0 1em;
            justify-items: center;
            table-layout: fixed;
            width: 100%;
        }

        .table-responsive th,
        td {
            word-wrap: break-word;
        }

        @media screen and (max-width: 450px) {

            .table-responsive th:nth-child(1),
            td:nth-child(1) {
                width: 10%;
            }

            .table-responsive th:nth-child(2),
            td:nth-child(2) {
                width: 10%;
            }

            .table-responsive th:nth-child(3),
            td:nth-child(3) {
                width: 15%;
            }

            .table-responsive th:nth-child(4),
            td:nth-child(4) {
                width: 23%;
            }

        }

    </style>

    <div class="row container crud">

        <div class="row titulo ">
            <h1 class="left">Vídeos:</h1>
            <span class="right chip">{{ $videos->count() }} Vídeos cadastrados</span>
        </div>
        @include('admin.includes.mensagens')
        <nav class="bg-gradient-blue">
            <div class="nav-wrapper">

                <form>
                    <div class="input-field">
                        <input placeholder="Pesquisar..." id="search" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>
        @foreach ($videos as $video)
            <div class="card z-depth-4 registros">
                <table class="striped table-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Usuário</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $video->id }}</td>
                            <td>{{ $video->title }}</td>
                            <td>{{ $video->user->login }}</td>
                            <td><a href="#edit-{{ $video->id }}"
                                    class="btn-floating modal-trigger  waves-effect waves-light orange"><i
                                        class="material-icons">mode_edit</i></a>
                                <a href="#delete-{{ $video->id }}"
                                    class="btn-floating modal-trigger  waves-effect waves-light red"><i
                                        class="material-icons">delete</i></a>
                                @include('admin.videos.edit', ['video' => $video])
                                @include('admin.videos.delete')
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
        <div class="row center" style="#ef5350 red lighten-1">
            {{ $videos->links('custom.pagination') }}
        </div>
    </div>
@endsection