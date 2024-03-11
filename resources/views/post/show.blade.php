<!-- resources/views/posts/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <x-post-card :$post />

                <!-- Форма для коментарів -->
                <div class="mt-4">

                    <h4>Add Comment</h4>
                    <form action="{{ route('posts.comments.store', $post) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea required class="form-control" name="comment" placeholder="Написати коментар..." rows="3" @error('comment') is-invalid @enderror></textarea>
                        </div>
                        @error('comment')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="mt-4">
                    <h4>Comments</h4>
                    @forelse ($post->comments as $comment)
                        <x-comment :$comment :$post />
                    @empty
                        <div class="mb-3">
                            <h3>No comments yet!</h3>
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


<script>
    function showEditForm(commentId) {
        var editForm = document.getElementById('edit-form-' + commentId);
        var commentText = document.getElementById('comment-' + commentId);
        if (editForm.style.display === "none") {
            editForm.style.display = "block";
            commentText.style.display = "none";
        } else {
            editForm.style.display = "none";
            commentText.style.display = "inline";
        }
    }
</script>
