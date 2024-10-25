<?php

namespace App\Livewire\Forms\Category;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StoreCategoryForm extends Form
{
    #[Validate('required|unique:categories,name', as: 'Nama Kategori')]
    public $name;

    #[Validate('required', as: 'Deskripsi Kategori')]
    public $description;

    public function store()
    {
        $this->validate();

        $category = Category::create([
            'name'        => $this->name,
            'description' => $this->description,
        ]);

        return $category;
    }
}
