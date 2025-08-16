@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/modal.css') }}">
@endpush

<!-- Modal Structure -->
<div id="edit-{{ $video->id }}" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">edit</i> Editar Vídeo</h4>
        <form action="{{ route('admin.videos.update', $video->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="input-field">
                <input id="title-{{ $video->id }}" type="text" name="title" value="{{ old('title', $video->title) }}" required>
                <label for="title-{{ $video->id }}" class="active">Título</label>
                @error('title')
                    <span class="helper-text red-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-field">
                <input id="link-{{ $video->id }}" type="url" name="link" value="{{ old('link', $video->link) }}" required>
                <label for="link-{{ $video->id }}" class="active">URL do Vídeo</label>
                @error('link')
                    <span class="helper-text red-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-field">
                <textarea id="description-{{ $video->id }}" class="materialize-textarea" name="description">{{ old('description', $video->description) }}</textarea>
                <label for="description-{{ $video->id }}" class="active">Descrição</label>
                @error('description')
                    <span class="helper-text red-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn blue">Cancelar</a>
                <button type="submit" class="waves-effect waves-green btn green">Salvar</button>
            </div>
        </form>
    </div>
</div>
