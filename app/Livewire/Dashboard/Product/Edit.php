<?php

namespace App\Livewire\Dashboard\Product;

use App\Livewire\Forms\Product\UpdateProductForm;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard-layout')]
class Edit extends Component
{
    use WithFileUploads;

    public UpdateProductForm $form;
    public Product $product;

    public $image;

    public $isUploaded = false;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048',
        ]);

        $this->isUploaded = true;
    }

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->form->fill($product);
    }

    public function save()
    {
        $this->form->update($this->product, $this->image);

        return $this->redirectRoute('products.edit', $this->product->id);
    }

    public function render()
    {
        return view('livewire.dashboard.product.form', [
            'page_meta'  => [
                'title' => 'Edit Product',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'categories' => Category::all(),
            'suppliers'  => Supplier::all(),
        ]);
    }
}
