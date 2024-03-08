<div class="card mb-3">
    <div class="card-body">
        <p class="card-text"><small class="text-muted">Дата:
                {{ $article->created_at->format('d.m.Y') }}</small></p>
        <h5 class="card-title">{{ $article->title }}</h5>
        <img src="{{ $article->image }}" class="card-img-top" alt="Article Image">
        <p class="card-text">{{ $article->content }}</p>
        {{$slot}}
        <p class="card-text"><small class="text-muted">Автор: {{ $article->user->name }}</small></p>
    </div>
</div>
