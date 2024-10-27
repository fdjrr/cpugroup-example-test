<?php

namespace App\Livewire\Dashboard\Product;

use App\Livewire\Forms\Product\StoreProductForm;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard-layout')]
class Create extends Component
{
    use WithFileUploads;

    public StoreProductForm $form;

    public $image;

    public $isUploaded = false;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048',
        ]);

        $this->isUploaded = true;
    }

    public function save()
    {
        $this->validate([
            'image' => 'required',
        ], attributes: [
            'image' => 'Gambar Produk',
        ]);

        $product = $this->form->store($this->image);

        Session::flash('flash', [
            'type'    => 'success',
            'message' => 'Product created',
        ]);

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
