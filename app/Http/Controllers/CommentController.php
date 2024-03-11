<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Post;
use App\Models\Comment;

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

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'comment' => $request['comment'],
            'post_id' => $post->id
        ]);

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
