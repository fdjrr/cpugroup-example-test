<?php

namespace App\Livewire\Forms\Category;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateCategoryForm extends Form
{
    public $name;

    public $description;

    public function update(Category $category)
    {
        $this->validate([
            'name'        => "required|unique:categories,name,{$category->id}",
            'description' => 'required',
        ], attributes: [
            'name'        => 'Nama Kategori',
            'description' => 'Deskripsi Kategori',
        ]);

        $category->update([
            'name'        => $this->name,
            'description' => $this->description,
        ]);

        return $category;
    }
}
