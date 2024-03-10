@extends('layouts.app')

@section('content')
    <!-- resources/views/posts/form.blade.php -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($post)
                        @method('PUT')
                    @endisset

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title', isset($post) ? $post->title : '') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="15" name="content">{{ old('content', isset($post) ? $post->content : '') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" value="$post->image"
                            name="image">
                    
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($post) ? 'Update' : 'Create' }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
