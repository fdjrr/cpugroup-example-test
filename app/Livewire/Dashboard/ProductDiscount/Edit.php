<?php

namespace App\Livewire\Dashboard\ProductDiscount;

use App\Livewire\Forms\ProductDiscount\UpdateProductDiscountForm;
use App\Models\Product;
use App\Models\ProductDiscount;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard-layout')]
class Edit extends Component
{
    public UpdateProductDiscountForm $form;

    public ProductDiscount $product_discount;

    public function mount(ProductDiscount $product_discount) {
        $this->product_discount = $product_discount;
        $this->form->fill($product_discount);
    }

    public function save() {
        if ($this->form->expired_at != $this->product_discount->expired_at && ProductDiscount::query()->filter([
            'expired_at' => $this->form->expired_at
        ])->exists()) {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Product category already exists.',
            ]);
        } else {
            $product_discount = $this->form->update($this->product_discount);
    
            Session::flash('flash', [
                'type'    => 'success',
                'message' => 'Product Discount updated',
            ]);
    
            return $this->redirectRoute('product_discounts.edit', $product_discount->id);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.product-discount.form', [
            'page_meta' => [
                'title' => 'Edit Product Discount',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'products' => Product::query()->orderBy('name')->get(),
        ]);
    }
}
