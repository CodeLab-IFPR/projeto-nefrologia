@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/editVideo.css') }}">
@endpush

<div class="container edit-container">
    <div class="edit-header">
        <div class="header-content">
            <div class="header-icon">
                <i class="material-icons">edit</i>
            </div>
            <div class="header-text">
                <h1>{{ $isEdit ? 'Editar Vídeo' : 'Cadastrar Vídeo' }}</h1>
                @if($isEdit)
                    <p class="video-title">{{ $video->title }}</p>
                @endif
            </div>
        </div>
    </div>

    {{-- Bloco para exibir erros de validação --}}
    @if ($errors->any())
        <div class="error-container">
            <div class="error-box">
                <div class="error-header">
                    <i class="material-icons">error</i>
                    <span>Erro de Validação</span>
                </div>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- Exibe mensagens de sucesso ou erro da sessão --}}
    @if (session('success'))
        <div class="success-container">
            <div class="success-box">
                <div class="success-header">
                    <i class="material-icons">check_circle</i>
                    <span>Sucesso</span>
                </div>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="error-container">
            <div class="error-box">
                <div class="error-header">
                    <i class="material-icons">error</i>
                    <span>Erro de Validação</span>
                </div>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    @endif

    {{-- Formulário --}}
    <div class="form-container">
        <form action="{{ $formAction }}" method="POST" id="edit-video-form">
            @if($isEdit)
                @method('PUT')
            @endif
            @csrf

            <div class="form-section">
                <div class="section-header">
                    <h3>Informações do Vídeo</h3>
                    <p>{{ $isEdit ? 'Atualize os detalhes do seu vídeo' : 'Insira os detalhes do seu vídeo' }}</p>
                </div>

                <div class="form-group">
                    <label for="title" class="form-label">Título do Vídeo</label>
                    <div class="input-wrapper">
                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $isEdit ? $video->title : '') }}"
                            required
                            class="form-input"
                            placeholder="Digite o título do vídeo"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="link" class="form-label">URL do Vídeo</label>
                    <div class="input-wrapper">
                        @php
                            $linkValue = '';
                            if ($isEdit) {
                                // Converte o link 'embed' de volta para o link 'watch' para facilitar a edição
                                $linkValue = str_replace('embed/', 'watch?v=', $video->link);
                            }
                        @endphp
                        <input
                            id="link"
                            type="url"
                            name="link"
                            value="{{ old('link', $linkValue) }}"
                            required
                            class="form-input"
                            placeholder="https://www.youtube.com/watch?v=..."
                        >
                    </div>
                    <div class="input-help">
                        <i class="material-icons">info</i>
                        <span>Cole aqui o link do YouTube do vídeo</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Descrição</label>
                    <div class="textarea-wrapper">
                        <textarea
                            id="description"
                            name="description"
                            class="form-textarea"
                            placeholder="Descreva o conteúdo do vídeo..."
                            rows="4"
                        >{{ old('description', $isEdit ? $video->description : '') }}</textarea>
                    </div>
                    <div class="input-help">
                        <i class="material-icons">info</i>
                        <span>Adicione uma descrição detalhada do vídeo</span>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">
                    <i class="material-icons">arrow_back</i>
                    Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="material-icons">save</i>
                    {{ $isEdit ? 'Salvar Alterações' : 'Cadastrar Vídeo' }}
                </button>
            </div>
        </form>
    </div>
</div>