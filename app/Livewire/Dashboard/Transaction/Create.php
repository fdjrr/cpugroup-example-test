<?php

namespace App\Livewire\Dashboard\Transaction;

use App\Livewire\Forms\Transaction\StoreTransactionForm;
use App\Models\Product;
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
            'products'  => Product::all(),
        ]);
    }
}
