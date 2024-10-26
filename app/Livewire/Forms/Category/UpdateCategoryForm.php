<?php

namespace App\Livewire\Forms\Category;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateCategoryForm extends Form
{
    public $image;

    public $name;

    public $description;

    public function update(Category $category, $image)
    {
        $this->validate([
            'name'        => "required|unique:categories,name,{$category->id}",
            'description' => 'required',
        ], attributes: [
            'image'       => 'Gambar Kategori',
            'name'        => 'Nama Kategori',
            'description' => 'Deskripsi Kategori',
        ]);

        $category->update([
            'image'       => $image ? $image->store('categories', 'public') : $category->image,
            'name'        => $this->name,
            'description' => $this->description,
        ]);

        return $category;
    }
}
