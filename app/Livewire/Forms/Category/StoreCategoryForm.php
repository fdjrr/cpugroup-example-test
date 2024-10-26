<?php

namespace App\Livewire\Forms\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StoreCategoryForm extends Form
{
    #[Validate('required|unique:categories,name', as: 'Nama Kategori')]
    public $name;

    #[Validate('required', as: 'Deskripsi Kategori')]
    public $description;

    public function store($image)
    {
        $this->validate();

        $category = Category::create([
            'image'       => $image->store('categories', 'public'),
            'name'        => $this->name,
            'description' => $this->description,
        ]);

        return $category;
    }
}
