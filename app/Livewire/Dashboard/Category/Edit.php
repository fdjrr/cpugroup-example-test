<?php

namespace App\Livewire\Dashboard\Category;

use App\Livewire\Forms\Category\UpdateCategoryForm;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard-layout')]
class Edit extends Component
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

    public Category $category;
    public UpdateCategoryForm $form;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->form->fill($category);
    }

    public function save()
    {
        $category = $this->form->update($this->category, $this->image);

        return $this->redirectRoute('categories.edit', $category->id);
    }

    public function render()
    {
        return view('livewire.dashboard.category.form', [
            'page_meta' => [
                'title' => 'Edit Category',
                'form'  => [
                    'action' => 'save',
                ],
            ],
        ]);
    }
}
