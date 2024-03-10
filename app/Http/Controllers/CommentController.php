<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request, Article $article)
    {

        $article->comments()->create([
            'user_id' => auth()->id,
            'comment' => $request['comment'],
            'article_id' => $article->id
        ]);

        return redirect()->route('articles.show', $article)
            ->with('success', 'Comment added.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Article $article, Comment $comment)
    {
        $comment->update([
            'comment' => $request['comment'],
        ]);

        return redirect()->back()->with('success', 'Comment successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article, Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment successfully removed.');
    }
}
