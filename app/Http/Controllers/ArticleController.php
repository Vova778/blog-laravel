<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('article.index', ['articles' => $articles]);
    }

    public function adminIndex()
    {
        $articles = Article::with('user')->withCount('comments')->latest()->paginate(10);
        return view('admin.dashboard', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create([
            'user_id' => auth()->id(),
            'title' => $request['title'],
            'content' => $request['content'],
            'image' => $request['image'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load('comments');
        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.article.edit', ['article' =>  $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'image' => $request['image'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Article updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back()->with(
            'success',
            'Article removed.'
        );
    }
}
