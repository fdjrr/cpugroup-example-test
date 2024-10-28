<?php

namespace App\Livewire\Dashboard\Transaction;

use App\Livewire\Forms\Transaction\StoreTransactionForm;
use App\Models\Product;
use App\Models\ProductDiscount;
use App\Services\DiscountService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard-layout')]
class Create extends Component
{
    public StoreTransactionForm $form;

    public function selectProduct()
    {
        $product = Product::find($this->form->product_id);
        if ($product) {
            $this->form->price = $product->price;

            if ($this->form->transaction_date) {
                $product_discount = ProductDiscount::query()->filter([
                    'product_id' => $product->id
                ])->latest()->first();
    
                if ($product_discount && Carbon::now()->format('Y-m-d') <= $product_discount->expired_at) {
                    $this->form->discount = $product_discount->discount;
                } else{
                    $this->form->discount = 0;
                }
            }
        }
    }

    public function checkDiscount() {
        if ($this->form->discount > 0) {
            $totalPrice = $this->form->price * $this->form->quantity;

            $this->form->total_discount = DiscountService::calculate($totalPrice, $this->form->discount);
        } else {
            $this->form->total_discount = 0;
        }
    }

    public function save()
    {
        $transaction = $this->form->store();

        if ($transaction) {
            Session::flash('flash', [
                'type'    => 'success',
                'message' => 'Transaction created',
            ]);

            return $this->redirectRoute('transactions.edit', $transaction->id);
        } else {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Failed to create transaction',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.transaction.form', [
            'page_meta' => [
                'title' => 'Create Transaction',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'products'  => Product::query()->orderBy('name')->get(),
        ]);
    }
}
