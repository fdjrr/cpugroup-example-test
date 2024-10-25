<?php

namespace App\Livewire\Forms\Product;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateProductForm extends Form
{
    public $name;

    public $category_id;

    public $supplier_id;

    public $sku;

    public $quantity;

    public $price;

    public $type;

    public $description;

    public function update(Product $product)
    {
        $this->validate([
            'name'        => "required|unique:products,name,{$product->id}",
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'sku'         => "required|unique:products,sku,{$product->id}",
            'price'       => 'required',
        ], attributes: [
            'name'        => 'Nama Produk',
            'category_id' => 'Kategori',
            'supplier_id' => 'Supplier',
            'sku'         => 'SKU Produk',
            'price'       => 'Harga Produk',
        ]);

        $product->update([
            'name'        => $this->name,
            'category_id' => $this->category_id,
            'supplier_id' => $this->supplier_id,
            'sku'         => $this->sku,
            'quantity'    => $this->quantity,
            'price'       => $this->price,
            'description' => $this->description,
        ]);

        return $product;
    }
}