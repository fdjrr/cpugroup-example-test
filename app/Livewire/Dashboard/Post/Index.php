<?php

namespace App\Livewire\Dashboard\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Session;
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

    public $id;

    public function delete($id)
    {
        $this->id = $id;

        return $this->dispatch('openDeleteModal');
    }

    public function confirmDelete()
    {
        $post = Post::find($this->id);
        if ($post) {
            $post->delete();

            Session::flash('flash', [
                'type'    => 'success',
                'message' => 'Post deleted',
            ]);

            return $this->dispatch('closeDeleteModal');
        } else {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Post not found.',
            ]);
        }
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
