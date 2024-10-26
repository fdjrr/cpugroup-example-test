<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'posts'      => Post::query()->take(3)->latest()->get(),
            'categories' => Category::all(),
        ]);
    }
}
