@if (session('success'))
    <div class="card-panel green lighten-4 green-text text-darken-4">
        {{ session('success') }}
    </div>
@endif
