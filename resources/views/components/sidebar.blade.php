<div class="sidebar">
    <h5>Топ 5 статей з найбільшою кількістю коментарів:</h5>
    <ul class="list-group">
        @foreach ($topPosts as $post)
            <li class="list-group-item">
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                <span class="badge bg-secondary">{{ $post->comments_count }}</span>
            </li>
        @endforeach
    </ul>
</div>
