<?php

namespace App\Livewire\Dashboard\Category;

use App\Livewire\Forms\Category\StoreCategoryForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard-layout')]
class Create extends Component
{
    public StoreCategoryForm $form;

    public function save()
    {
        $category = $this->form->store();

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
        ]);
    }
}
