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
                        <div class="mb-3">
                            <strong>{{ $comment->user->name }}</strong>: <span
                                id="comment-{{ $comment->id }}">{{ $comment->comment }}</span>

                            @if (true)
                                <form
                                    action="{{ route('posts.comments.destroy', ['post' => $post, 'comment' => $comment->id]) }}"
                                    method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                                <button class="btn btn-primary btn-sm"
                                    onclick="showEditForm('{{ $comment->id }}')">Edit</button>

                                <div id="edit-form-{{ $comment->id }}" style="display: none;">
                                    <form
                                        action="{{ route('posts.comments.update', ['post' => $post, 'comment' => $comment->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <textarea class="form-control" name="comment" rows="3" @error('comment') is-invalid @enderror>{{ $comment->comment }}</textarea>
                                        @error('comment')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Save</button>
                                    </form>
                                </div>
                            @endif

                        </div>
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
