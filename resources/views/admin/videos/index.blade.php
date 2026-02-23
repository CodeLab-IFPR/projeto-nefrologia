@extends('layout')
@section('title', 'Gerenciar Vídeos')
@section('conteudo')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/admin/indexVideo.css') }}">
    @endpush

    <div class="container" id="video-container">
        {{-- CABEÇALHO DA PÁGINA --}}
        <div class="row">
            <div class="col s8 m10">
                <h4>Gerenciar Vídeos</h4>
            </div>
            <div class="col s4 m2 right-align">
                <span id="video-count" class="chip blue white-text">{{ $videos->total() }} vídeos</span>
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
        <a id="create-video" class="waves-effect waves-light btn modal-trigger blue"
            href="{{ route('admin.videos.create') }}">
            <i class="material-icons left">add</i>Adicionar Novo Vídeo
        </a>

        {{-- TABELA DE VÍDEOS --}}
        <div class="responsive-table">
            <table class="striped highlight table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Usuário</th>
                        <th id="action-th" class="center-align">Ações</th>
                    </tr>
                </thead>
                <tbody class="responsive-table-body">
                    @forelse ($videos as $video)
                        <tr>
                            <td>{{ $video->title }}</td>
                            <td>{{ $video->user->name }}</td>
                            <td class="center-align">
                                <a href="{{ route('admin.videos.edit', $video->id) }}"
                                    class="btn-floating modal-trigger waves-effect waves-light blue">
                                    <i class="material-icons">edit</i></a>
                                <a href="#delete-{{ $video->id }}"
                                    class="btn-floating modal-trigger waves-effect waves-light orange darken-2"><i
                                        class="material-icons">delete</i></a>

                                {{-- Substitua o form existente por este botão --}}
                                <a href="#showcase-{{ $video->id }}"
                                    class="btn-floating modal-trigger waves-effect waves-light {{ $video->is_showcase ? 'yellow darken-2' : 'green' }}">
                                    <i class="material-icons">star</i>
                                </a>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Nenhum vídeo cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- LINKS DE PAGINAÇÃO --}}
        <div class="center-align" id="pagination">
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
            <button type="submit" form="add-video-form" class="waves-effect waves-light btn">Salvar</button>
        </div>
    </div>

    @foreach ($videos as $video)
        {{-- @include('admin.modal.edit', ['video' => $video]) --}}
        @include('admin.modal.delete', ['video' => $video])

        {{-- Modal de Confirmação Showcase --}}
        <div id="showcase-{{ $video->id }}" class="modal" style="width: 400px; border-radius: 8px;">
            <div class="modal-content" style="padding: 20px;">
                <h5 style="margin-top: 0; margin-bottom: 8px;">
                    <i class="material-icons left yellow-text text-darken-2">star</i>
                    {{ $video->is_showcase ? 'Vídeo em Destaque' : 'Confirmar Destaque' }}
                </h5>
                @if ($video->is_showcase)
                    <p class="grey-text">Este vídeo já está definido como destaque na página inicial.</p>
                @else
                    <p class="grey-text">Deseja definir <b>{{ $video->title }}</b> como vídeo em destaque?</p>
                @endif
            </div>
            <div class="modal-footer" style="padding: 4px 20px 20px;">
                @if ($video->is_showcase)
                    <a href="#!" class="modal-close btn-flat blue white-text">OK</a>
                @else
                    <form action="{{ route('admin.videos.showcase', $video->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <a href="#!" class="modal-close btn-flat grey-text">Cancelar</a>
                        <button type="submit" class="btn-flat blue white-text">Definir destaque</button>
                    </form>
                @endif
            </div>
        </div>
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

@endsection
