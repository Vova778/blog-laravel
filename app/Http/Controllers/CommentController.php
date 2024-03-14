<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Post;
use App\Models\Comment;
use App\Notifications\NewCommentNotification;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request, Post $post)
    {

        $comment = $post->comments()->create([
            'user_id' => auth()->user()->id,
            'comment' => $request['comment'],
            'post_id' => $post->id
        ]);

        try {
            if ($comment->user_id !== $post->user_id) {
                Notification::send($post->user, new NewCommentNotification($comment, $post));
            }
        } catch (Exception $e) {
            Log::error('Error sending notification: ' . $e->getMessage());
        }

        return redirect()->route('posts.show', $post)
            ->with('success', 'Comment added.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Post $post, Comment $comment)
    {
        $comment->update([
            'comment' => $request['comment'],
        ]);

        return redirect()->back()->with('success', 'Comment successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment successfully removed.');
    }
}
