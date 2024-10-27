<?php

namespace App\Livewire\Forms\Product;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StoreProductForm extends Form
{
    public $image;

    #[Validate('required|unique:products,name', as: 'Nama Produk')]
    public $name;

    #[Validate('required|exists:categories,id', as: 'Kategori')]
    public $category_id;

    #[Validate('required|exists:suppliers,id', as: 'Supplier')]
    public $supplier_id;

    #[Validate('required|unique:products,sku', as: 'SKU Produk')]
    public $sku;

    public $quantity;

    #[Validate('required|numeric', as: 'Harga Produk')]
    public $price;

    #[Validate('required', as: 'Deskripsi Produk')]
    public $description;

    public function store($image)
    {
        $this->validate();

        $product = Product::create([
            'image'       => $image->store('products', 'public'),
            'name'        => $this->name,
            'category_id' => $this->category_id,
            'supplier_id' => $this->supplier_id,
            'sku'         => $this->sku,
            'quantity'    => 0,
            'price'       => $this->price,
            'description' => $this->description,
        ]);

        return $product;
    }
}
