@extends('layout')
@section('title', 'Editar Vídeo')
@section('conteudo')
<style>
    .error-box {
        background-color: #ffebee; /* Fundo vermelho bem claro */
        border: 1px solid #d32f2f; /* Borda vermelha */
        border-radius: 5px;
        padding: 15px;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .error-box ul {
        margin: 0;
        padding-left: 20px; /* Adiciona recuo para a lista */
    }
</style>

<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="row">
        <div class="col s12">
            <h4><i class="material-icons">edit</i> Editar Vídeo: {{ $video->title }}</h4>

            {{-- Bloco para exibir erros de validação --}}
            @if ($errors->any())
                <div class="error-box red-text text-darken-4" style="margin-top: 10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- SEU FORMULÁRIO DE EDIÇÃO --}}
            <form action="{{ route('admin.videos.update', $video->id) }}" method="POST" style="margin-top: 20px;">
                @method('PUT')
                @csrf

                <div class="input-field">
                    <input id="title" type="text" name="title" value="{{ old('title', $video->title) }}" required>
                    <label for="title" class="active">Título</label>
                </div>

                <div class="input-field">
                    @php
                        // Converte o link 'embed' de volta para o link 'watch' para facilitar a edição
                        $youtube_watch_url = str_replace('embed/', 'watch?v=', $video->link);
                    @endphp
                    <input id="link" type="url" name="link" value="{{ old('link', $youtube_watch_url) }}" required>
                    <label for="link" class="active">URL do Vídeo</label>
                </div>

                <div class="input-field">
                    <textarea id="description" class="materialize-textarea" name="description">{{ old('description', $video->description) }}</textarea>
                    <label for="description" class="active">Descrição</label>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
                    <a href="{{ route('admin.videos.index') }}" class="waves-effect waves-grey btn-flat">Cancelar</a>
                    <button type="submit" class="waves-effect waves-light btn" style="background-color: #187bcd;">Salvar Alterações</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection