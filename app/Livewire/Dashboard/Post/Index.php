<?php

namespace App\Livewire\Dashboard\Post;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard-layout')]
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
        ])->latest()->paginate(10)->withQueryString();

        return view('livewire.dashboard.post.index', [
            'page_meta' => [
                'title' => 'List Post',
            ],
            'posts'     => $posts,
        ]);
    }
}
