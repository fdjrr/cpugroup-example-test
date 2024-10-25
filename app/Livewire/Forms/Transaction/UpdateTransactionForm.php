<?php

namespace App\Livewire\Forms\Transaction;

use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Throwable;

class UpdateTransactionForm extends Form
{
    public $id;

    public $user_id;

    #[Validate('required|exists:products,id', as: 'Produk')]
    public $product_id;

    #[Validate('required|numeric', as: 'Jumlah Produk')]
    public $quantity;

    #[Validate('required|numeric', as: 'Harga Produk')]
    public $price;

    #[Validate('required', as: 'Tipe Transaksi')]
    public $transaction_type;

    #[Validate('required|date', as: 'Tanggal Transaksi')]
    public $transaction_date;

    public $description;

    public function update(Transaction $transaction)
    {
        $this->validate();

        DB::beginTransaction();

        try {
            $product = Product::find($this->product_id);
            if ($product) {
                if ($this->transaction_type === "Out") {
                    $quantity = ($product->quantity + $transaction->quantity) - $this->quantity;

                    if ($quantity < 0) {
                        throw new Exception('Stok produk tidak mencukupi');
                    } else {
                        $product->update([
                            'quantity' => $quantity,
                        ]);
                    }
                }

                if ($this->transaction_type === "In") {
                    $product->update([
                        'quantity' => ($product->quantity - $transaction->quantity) + $this->quantity,
                    ]);
                }
            }

            $transaction->update([
                'product_id'       => $this->product_id,
                'quantity'         => $this->quantity,
                'price'            => $this->price,
                'total'            => $this->price * $this->quantity,
                'transaction_type' => $this->transaction_type,
                'transaction_date' => Carbon::parse($this->transaction_date)->format('Y-m-d'),
                'description'      => $this->description,
            ]);

            DB::commit();

            return $transaction;
        } catch (Throwable $e) {
            DB::rollBack();

            return null;
        }
    }
}