<?php

namespace App\Livewire\Dashboard\Product;

use App\Livewire\Forms\Product\StoreProductForm;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard-layout')]
class Create extends Component
{
    public StoreProductForm $form;

    public function save()
    {
        $product = $this->form->store();

        return $this->redirectRoute('products.edit', $product->id);
    }

    public function render()
    {
        return view('livewire.dashboard.product.form', [
            'page_meta'  => [
                'title' => 'Create Product',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'product'    => new Product(),
            'categories' => Category::all(),
            'suppliers'  => Supplier::all(),
        ]);
    }
}
