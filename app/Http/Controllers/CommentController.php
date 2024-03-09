<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Article $article)
    {
        $validatedData  = $request->validate([
            'comment' => 'required|min:3|max:150',
        ]);

        $article->comments()->create([
            'user_id' => 1,
            'comment' => $validatedData['comment'],
            'article_id' => $article->id
        ]);

        return redirect()->route('articles.show', $article)
            ->with('success', 'Comment added.');
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Article $article, Comment $comment)
    {

        $request->validate([
            'comment' => 'required|min:3|max:150',
        ]);

        $comment->update([
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with(
            'success',
            'Comment updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article, Comment $comment)
    {

        $comment->delete();

        return redirect()->back()->with(
            'success',
            'Comment removed.'
        );

    }
}
