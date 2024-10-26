<?php

namespace App\Livewire\Dashboard\Category;

use App\Livewire\Forms\Category\StoreCategoryForm;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard-layout')]
class Create extends Component
{
    use WithFileUploads;

    public $image;
    public $isUploaded = false;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048',
        ]);

        $this->isUploaded = true;
    }

    public StoreCategoryForm $form;

    public function save()
    {
        $this->validate([
            'image' => 'required',
        ], attributes: [
            'image' => 'Gambar Kategori',
        ]);

        $category = $this->form->store($this->image);

        return $this->redirectRoute('categories.edit', $category->id);
    }

    public function render()
    {
        return view('livewire.dashboard.category.form', [
            'page_meta' => [
                'title' => 'Create Category',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'category'  => new Category(),
        ]);
    }
}
