<!-- resources/views/articles/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-article-card :$article />

                <!-- Форма для коментарів -->
                <div class="mt-4">
                    <h4>Add Comment</h4>
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="mb-3">
                            <label for="commentator_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="commentator_name" name="commentator_name"
                                required minlength="3" maxlength="50">
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required minlength="3" maxlength="150"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="mt-4">
                    <h4>Comments</h4>
                    @forelse ( $article->comments as $comment )
                    <div class="mb-3">
                        <strong>{{ $comment->user_id }}</strong>: {{ $comment->comment }}
                    </div>
                    @empty
                    <div class="mb-3">
                        <h3>Коментарів немає!</h3>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="col-md-2">
                <x-sidebar />
            </div>

        </div>
    </div>
@endsection
