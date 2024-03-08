<div class="sidebar">
    <h4>Топ 5 статей з найбільшою кількістю коментарів:</h4>
    <ul class="list-group">
        @foreach ($topArticles as $article)
            <li class="list-group-item">
                <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                <span class="badge bg-secondary">{{ $article->comments_count }}</span>
            </li>
        @endforeach
    </ul>
</div>
