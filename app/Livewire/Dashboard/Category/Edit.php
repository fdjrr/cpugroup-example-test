<?php

namespace App\Livewire\Dashboard\Category;

use App\Livewire\Forms\Category\UpdateCategoryForm;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard-layout')]
class Edit extends Component
{
    public Category $category;
    public UpdateCategoryForm $form;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->form->fill($category);
    }

    public function save()
    {
        $category = $this->form->update($this->category);

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
