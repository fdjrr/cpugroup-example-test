<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $table = 'transactions';
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $search           = $filters['search'] ?? false;
        $transaction_date = $filters['transaction_date'] ?? false;

        $query->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->whereHas('product', function ($query) use ($search) {
                        $query
                            ->whereLike('name', "%$search%")
                            ->orWhereLike('sku', "%$search%");
                    });
            });
        });

        $query->when($transaction_date, function ($query, $transaction_date) {
            $query->where('transaction_date', $transaction_date);
        });
    }

    /**
     * Get the user that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the product that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
