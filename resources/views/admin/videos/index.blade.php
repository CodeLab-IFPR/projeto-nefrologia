@extends('layout')
@section('title', 'Gerenciar Vídeos')
@section('conteudo')

    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
        {{-- CABEÇALHO DA PÁGINA --}}
        <div class="row" style="display: flex; align-items: center; margin-bottom: 20px;">
            <div class="col s8 m10">
                <h4 style="margin: 0; font-size: 2rem;">Gerenciar Vídeos</h4>
            </div>
            <div class="col s4 m2 right-align">
                <span class="chip white-text" style="background-color: #187bcd;">{{ $videos->total() }} vídeos</span>
            </div>
        </div>

        {{-- MENSAGENS DE SUCESSO E ERRO --}}
        @if (session('success'))
            <div class="card-panel green lighten-4 green-text text-darken-4">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="card-panel red lighten-4 red-text text-darken-4">{{ session('error') }}</div>
        @endif

        {{-- BOTÃO PARA ADICIONAR NOVO VÍDEO --}}
        <a class="waves-effect waves-light btn modal-trigger" style="background-color: #187bcd; margin-bottom: 20px;"
            href="{{ route('admin.videos.create') }}">
            <i class="material-icons left">add</i>Adicionar Novo Vídeo
        </a>

        {{-- TABELA DE VÍDEOS --}}
        <table class="striped highlight responsive-table" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Usuário</th>
                    <th class="center-align" style="width: 150px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($videos as $video)
                    <tr>
                        <td style="vertical-align: middle;">{{ $video->title }}</td>
                        <td style="vertical-align: middle;">{{ $video->user->name }}</td>
                        <td class="center-align" style="vertical-align: middle;">
                            <a href="{{ route('admin.videos.edit', $video->id) }}"
                                class="btn-floating modal-trigger waves-effect waves-light"
                                style="background-color: #187bcd;"><i class="material-icons">edit</i></a>
                            <a href="#delete-{{ $video->id }}"
                                class="btn-floating modal-trigger waves-effect waves-light orange darken-2"><i
                                    class="material-icons">delete</i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum vídeo cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- LINKS DE PAGINAÇÃO --}}
        <div class="center-align" style="margin-top: 20px;">
            {{ $videos->links('custom.pagination') }}
        </div>
    </div>


    {{-- ================================================= --}}
    {{-- MODAIS --}}
    {{-- ================================================= --}}

    <div id="modal-add-video" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Cadastrar Novo Vídeo</h4>
            <form id="add-video-form" method="POST" action="{{ route('admin.videos.store') }}" class="col s12">
                @csrf
                <div class="row">
                    <div class="input-field col s12"><input id="title" name="title" type="text"
                            value="{{ old('title') }}" required><label for="title">Título</label>
                        @error('title')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col s12"><input id="link" name="link" type="text"
                            value="{{ old('link') }}" required><label for="link">Link do YouTube</label>
                        @error('link')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <textarea id="description" name="description" class="materialize-textarea">{{ old('description') }}</textarea><label for="description">Descrição</label>
                        @error('description')
                            <span class="helper-text red-text">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-grey btn-flat">Cancelar</a>
            <button type="submit" form="add-video-form" class="waves-effect waves-light btn"
                style="background-color: #187bcd;">Salvar</button>
        </div>
    </div>

    @foreach ($videos as $video)
        {{-- @include('admin.modal.edit', ['video' => $video]) --}}
        @include('admin.modal.delete', ['video' => $video])
    @endforeach

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('is_editing'))
                    var modal = document.getElementById('edit-{{ session('is_editing') }}');
                    if (modal) {
                        var instance = M.Modal.getInstance(modal);
                        if (instance) {
                            instance.open();
                        } else {
                            // Se ainda não foi inicializado (caso raro)
                            var instance = M.Modal.init(modal);
                            instance.open();
                        }
                    }
                @else
                    var modal = document.getElementById('modal-add-video');
                    if (modal) {
                        var instance = M.Modal.getInstance(modal);
                        if (instance) {
                            instance.open();
                        } else {
                            var instance = M.Modal.init(modal);
                            instance.open();
                        }
                    }
                @endif
            });
        </script>
    @endif

    @push('styles')
        <style>
            .btn[style*="#187bcd"]:hover {
                background-color: rgb(20, 103, 175) !important;
            }

            .modal .modal-content h4,
            .modal .modal-content label {
                color: #333;
            }
        </style>
    @endpush

@endsection
