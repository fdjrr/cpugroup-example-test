<?php

namespace App\Livewire\Forms\Transaction;

use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Throwable;

class StoreTransactionForm extends Form
{
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

    public function store()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            $transaction = Transaction::create([
                'user_id'          => Auth::user()->id,
                'product_id'       => $this->product_id,
                'quantity'         => $this->quantity,
                'price'            => $this->price,
                'total'            => $this->price * $this->quantity,
                'transaction_type' => $this->transaction_type,
                'transaction_date' => Carbon::parse($this->transaction_date)->format('Y-m-d'),
                'description'      => $this->description,
            ]);

            $product = Product::find($this->product_id);
            if ($product) {
                if ($transaction->transaction_type === "Out") {
                    if ($product->quantity <= 0 || $product->quantity < $this->quantity) {
                        throw new Exception('Stok produk tidak mencukupi');
                    } else {
                        $product->update([
                            'quantity' => $product->quantity - $this->quantity,
                        ]);
                    }
                }

                if ($transaction->transaction_type === "In") {
                    $product->update([
                        'quantity' => $product->quantity + $this->quantity,
                    ]);
                }
            }

            DB::commit();

            return $transaction;
        } catch (Throwable $e) {
            DB::rollBack();

            return null;
        }
    }
}
