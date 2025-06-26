    <!-- Modal Structure -->
    <div id="edit-{{ $video->id }}" class="modal">
        <div class="modal-content">
            <h4><i class="material-icons">edit</i> Editar Vídeo</h4>
            <form action="{{ route('videos.update', $video->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="input-field">
                    <input id="title-{{ $video->id }}" type="text" name="title" value="{{ $video->title }}" required>
                    <label for="title-{{ $video->id }}">Título</label>
                </div>

                <div class="input-field">
                    <input id="link-{{ $video->id }}" type="url" name="link" value="{{ $video->link }}" required>
                    <label for="link-{{ $video->id }}">URL do Vídeo</label>
                </div>

                <div class="input-field">
                    <textarea id="description-{{ $video->id }}" class="materialize-textarea" name="description">{{ $video->description }}</textarea>
                    <label for="description-{{ $video->id }}">Descrição</label>
                </div>

                <div class="modal-footer" style="display: flex; justify-content: flex-end; gap: 10px;">
                    <a href="#!" class="modal-close waves-effect waves-green btn blue">Cancelar</a>
                    <button type="submit" class="waves-effect waves-green btn green">Salvar</button>
                </div>
            </form>
        </div>
    </div>
