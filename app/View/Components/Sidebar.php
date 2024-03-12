<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $topPosts;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->topPosts = Post::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->take(5)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
