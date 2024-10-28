<?php

namespace App\Livewire\Forms\ProductDiscount;

use App\Models\ProductDiscount;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateProductDiscountForm extends Form
{
    #[Validate('required|exists:products,id')]
    public $product_id;

    #[Validate('required', 'Diskon')]
    public $discount = 0;

    #[Validate('required|date', as: 'Tanggal Expired')]
    public $expired_at;

    public function update(ProductDiscount $product_discount) {
        $this->validate();

        $product_discount->update([
            'product_id' => $this->product_id,
            'discount' => $this->discount,
            'expired_at' => $this->expired_at,
        ]);

        return $product_discount;
    }
}
