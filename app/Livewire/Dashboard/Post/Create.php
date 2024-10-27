<?php

namespace App\Livewire\Dashboard\Post;

use App\Livewire\Forms\Post\StorePostForm;
use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard-layout')]
class Create extends Component
{
    use WithFileUploads;

    public StorePostForm $form;

    public $image;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048',
        ]);

        $this->isUploaded = true;
    }

    public $isUploaded = false;

    public function save()
    {
        $this->validate([
            'image' => 'required',
        ], attributes: [
            'image' => 'Gambar',
        ]);

        $post = $this->form->store($this->image);

        Session::flash('flash', [
            'type'    => 'success',
            'message' => 'Post created',
        ]);

        return $this->redirectRoute('posts.edit', $post->id);
    }

    public function render()
    {
        return view('livewire.dashboard.post.form', [
            'page_meta' => [
                'title' => 'Create Post',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'post'      => new Post(),
        ]);
    }
}
