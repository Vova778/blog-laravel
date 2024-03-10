<div class="card">
    <div class="card-header"><h4>{{ $post->title }}</h4></div>
    <div class="card-body">
        <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="post Image">
        <div class="mt-3">
            <p class="card-text">{{ $post->content }}</p>
            {{$slot}}
        </div>
    </div>
    <div class="card-footer text-muted">
        Автор: {{ $post->user->name }}
        <span class="float-end">Дата: {{ $post->created_at->format('d.m.Y') }}</span>
    </div>
</div>
