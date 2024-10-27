<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::query()->filter([
            'search' => $this->search,
        ])->published()->latest()->paginate(4)->withQueryString();

        return view('livewire.post.index', [
            'posts' => $posts,
        ]);
    }
}
