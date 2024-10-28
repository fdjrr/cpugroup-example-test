<?php

namespace App\Livewire\Dashboard\ProductDiscount;

use App\Livewire\Forms\ProductDiscount\StoreProductDiscountForm;
use App\Models\Product;
use App\Models\ProductDiscount;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard-layout')]
class Create extends Component
{
    public StoreProductDiscountForm $form;

    public function save() {
        $product_discount = ProductDiscount::query()->filter([
            'expired_at' => $this->form->expired_at
        ])->first();
        if ($product_discount) {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Product category already exists.',
            ]);
        } else {
            $product_discount = $this->form->store();
    
            Session::flash('flash', [
                'type'    => 'success',
                'message' => 'Product Discount created',
            ]);
    
            return $this->redirectRoute('product_discounts.edit', $product_discount->id);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.product-discount.form', [
            'page_meta' => [
                'title' => 'Create Product Category',
                'form' => [
                    'action' => 'save'
                ]
            ],
            'products' => Product::query()->orderBy('name')->get(),
        ]);
    }
}
