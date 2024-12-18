<?php

namespace App\Livewire\Forms\ProductDiscount;

use App\Models\ProductDiscount;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StoreProductDiscountForm extends Form
{
    #[Validate('required|exists:products,id')]
    public $product_id;

    #[Validate('required', 'Diskon')]
    public $discount = 0;

    #[Validate('required|date', as: 'Tanggal Expired')]
    public $expired_at;

    public function store() {
        $this->validate();

        $product_discount = ProductDiscount::create([
            'product_id' => $this->product_id,
            'discount' => $this->discount,
            'expired_at' => $this->expired_at,
        ]);

        return $product_discount;
    }
}
