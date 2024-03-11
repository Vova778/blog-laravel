<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('post.index', ['posts' => $posts]);
    }

    public function adminIndex()
    {
        $posts = Post::with('user')->withCount('comments')->latest()->paginate(10);
        return view('admin.dashboard', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(postRequest $request)
    {

        $file = $request->file('image');
        $path = $file->store('images', 'public');

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request['title'],
            'content' => $request['content'],
            'image' => $path,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('comments');
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', ['post' =>  $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'image' => $request['image'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with(
            'success',
            'Post removed.'
        );
    }
}
