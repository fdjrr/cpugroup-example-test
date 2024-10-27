<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $posts = Post::query()->published()->take(4)->latest()->get();

        return view('livewire.home', [
            'posts'      => $posts,
            'categories' => Category::all(),
        ]);
    }
}
