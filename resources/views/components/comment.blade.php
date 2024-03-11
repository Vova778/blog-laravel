<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="card-title">{{ $comment->user->name }}</h5>
                <small class="text-muted">{{ $comment->created_at->format('F j, Y, g:i a') }} @if ($comment->created_at!=$comment->updated_at)
                    <strong> (Edited)</strong>
                @endif</small>
            </div>
            @if (auth()->check() && $comment->user_id == auth()->user()->id)
            <div class="d-flex align-items-center">
                <form action="{{ route('posts.comments.destroy', ['post' => $post, 'comment' => $comment->id]) }}"
                    method="POST" class="pe-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
                <button class="btn btn-primary btn-sm " style="margin-top: -13px;" onclick="showEditForm('{{ $comment->id }}')">Edit</button>
            </div>
            @endif
        </div>
        <p class="card-text mt-2" id="comment-{{ $comment->id }}">{{ $comment->comment }}</p>

        <div id="edit-form-{{ $comment->id }}" style="display: none;">
            <form action="{{ route('posts.comments.update', ['post' => $post, 'comment' => $comment->id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <textarea class="form-control mt-2" name="comment" rows="3" @error('comment') is-invalid @enderror>{{ $comment->comment }}</textarea>
                @error('comment')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary btn-sm mt-2">Save</button>
            </form>
        </div>
    </div>
</div>

<script>
    function showEditForm(commentId) {
        var editForm = document.getElementById('edit-form-' + commentId);
        var commentText = document.getElementById('comment-' + commentId);
        if (editForm.style.display === "none") {
            editForm.style.display = "block";
            commentText.style.display = "none";
        } else {
            editForm.style.display = "none";
            commentText.style.display = "block";
        }
    }

    function confirmDelete(commentId) {
        var confirmation = confirm('Are you sure you want to delete this comment?');
        if (confirmation) {
            document.getElementById('delete-form-' + commentId).submit();
        }
    }
</script>
