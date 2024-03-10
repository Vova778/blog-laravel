@extends('layouts.app')

@section('content')
    <!-- resources/views/articles/form.blade.php -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ isset($article) ? route('articles.update', $article) : route('articles.store') }}"
                    method="POST">
                    @csrf
                    @isset($article)
                        @method('PUT')
                    @endisset

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', isset($article) ? $article->title : '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" rows="15" name="content">{{ old('content', isset($article) ? $article->content : '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="text" class="form-control" id="image" name="image"
                            value="{{ old('image', isset($article) ? $article->image : '') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($article) ? 'Update' : 'Create' }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
