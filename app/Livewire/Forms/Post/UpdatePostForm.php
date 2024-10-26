<?php

namespace App\Livewire\Forms\Post;

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdatePostForm extends Form
{
    public $image;

    public $slug;

    #[Validate('required', as: 'Judul')]
    public $title;

    #[Validate('required|min:10', as: 'Content')]
    public $content;

    public $is_published = false;

    public function update(Post $post, $image)
    {
        $this->validate();

        $post->update([
            'image'        => $image ? $image->store('posts', 'public') : $post->image,
            'slug'         => $post->title != $this->title ? Str::slug(Str::limit($this->title, 25)) . '-' . Str::random(5) : $post->slug,
            'title'        => $this->title,
            'content'      => $this->content,
            'is_published' => $this->is_published ? 1 : 0,
        ]);

        return $post;
    }
}
