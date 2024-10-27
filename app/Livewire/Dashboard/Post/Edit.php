<?php

namespace App\Livewire\Dashboard\Post;

use App\Livewire\Forms\Post\UpdatePostForm;
use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard-layout')]
class Edit extends Component
{
    use WithFileUploads;

    public Post $post;
    public UpdatePostForm $form;

    public $image;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048',
        ]);

        $this->isUploaded = true;
    }

    public $isUploaded = false;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->form->fill($post);
    }

    public function save()
    {
        $post = $this->form->update($this->post, $this->image);

        Session::flash('flash', [
            'type'    => 'success',
            'message' => 'Post updated',
        ]);

        return $this->redirectRoute('posts.edit', $post->id);
    }

    public function render()
    {
        return view('livewire.dashboard.post.form', [
            'page_meta' => [
                'title' => 'Edit Post',
                'form'  => [
                    'action' => 'save',
                ],
            ],
        ]);
    }
}
