<?php

namespace App\Livewire\Dashboard\Transaction;

use App\Livewire\Forms\Transaction\UpdateTransactionForm;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard-layout')]
class Edit extends Component
{
    public UpdateTransactionForm $form;
    public Transaction $transaction;

    public function mount(Transaction $transaction)
    {
        $this->transaction = $transaction;
        $this->form->fill($transaction);
    }

    public function selectProduct()
    {
        $product = Product::find($this->form->product_id);
        if ($product) {
            $this->form->price = $product->price;
        }
    }

    public function save()
    {
        $transaction = $this->form->update($this->transaction);
        if ($transaction) {
            Session::flash('flash', [
                'type'    => 'success',
                'message' => 'Transaction updated',
            ]);

            return $this->redirectRoute('transactions.edit', $this->transaction->id);
        } else {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Failed to update transaction',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.transaction.form', [
            'page_meta' => [
                'title' => 'Edit Transaction',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'products'  => Product::all(),
        ]);
    }
}
