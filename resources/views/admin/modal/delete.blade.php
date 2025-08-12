@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/modal.css') }}">
@endpush

<!-- Modal Structure -->
<div id="delete-{{ $video->id }}" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">delete</i> Deseja excluir?</h4>
        <p>Tem certeza que deseja excluir o vídeo {{ $video->title }}?</p>
    </div>

    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn blue">Cancelar</a>
        <form action="{{ route('admin.videos.destroy', $video->id) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="waves-effect waves-green btn red">Excluir</button>
        </form>
    </div>
</div>
