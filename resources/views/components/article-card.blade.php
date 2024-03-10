<div class="card">
    <div class="card-header"><h4>{{ $article->title }}</h4></div>
    <div class="card-body">
        <img src="{{ asset('storage/'.$article->image) }}" class="card-img-top" alt="Article Image">
        <div class="mt-3">
            <p class="card-text">{{ $article->content }}</p>
            {{$slot}}
        </div>
    </div>
    <div class="card-footer text-muted">
        Автор: {{ $article->user->name }}
        <span class="float-end">Дата: {{ $article->created_at->format('d.m.Y') }}</span>
    </div>
</div>
