<?php

namespace App\Livewire\Forms\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StorePostForm extends Form
{
    public $image;

    public $slug;

    #[Validate('required', as: 'Judul')]
    public $title;

    #[Validate('required|min:10', as: 'Content')]
    public $content;

    public $is_published = false;

    public function store($image)
    {
        $this->validate();

        $post = Post::create([
            'user_id'      => Auth::user()->id,
            'image'        => $image->store('posts', 'public'),
            'slug'         => Str::slug(Str::limit($this->title, 25)) . Str::random(5),
            'title'        => $this->title,
            'content'      => $this->content,
            'is_published' => $this->is_published ? 1 : 0,
        ]);

        return $post;
    }
}
