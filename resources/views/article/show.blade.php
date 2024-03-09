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
                <form action="{{ route('articles.comments.store', $article) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea required class="form-control" name="comment" placeholder="Написати коментар..." rows="3"></textarea>
                    </div>
                    @error('comment')
                        <div class="text-warm">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="mt-4">

                <h4>Comments</h4>
                @forelse ($article->comments as $comment)
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
