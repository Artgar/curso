<div class="card mt-4">
    <div class="card-header">
        <h1>{{ $post->titulo }}</h1>
    </div>
    <div class="card-body">
        <p class="fs-6">{{ $post->temas->nombreTema }}</p>
        <p class="fs-4">{{ $post->contenido }}</p>
    </div>
    <div class="card-footer">
        {{ $post->user->name." - ".$post->created_at}}
    </div>
</div>