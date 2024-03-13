<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $userId = Auth::id();
        Log::info('New post created by user ' . $userId . '. Title: ' . $post->title . ', Content: ' . $post->content);
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        $userId = Auth::id();
        Log::info('Post updated by user ' . $userId . '. Title: ' . $post->title . ', Content: ' . $post->content);
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        $userId = Auth::id();
        Log::info('Post deleted by user ' . $userId . '. Title: ' . $post->title);
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        $userId = Auth::id();
        Log::info('Post restored by user ' . $userId . '. Title: ' . $post->title);
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        $userId = Auth::id();
        Log::info('Post permanently deleted by user ' . $userId . '. Title: ' . $post->title);
    }
}
