<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDiscount extends Model
{
    use SoftDeletes;

    protected $table = "product_discounts";
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters) {
        $search = $filters['search'] ?? false;
        $product_id = $filters['product_id'] ?? false;

        $query->when($search, function($query, $search) {
            $query->where(function($query) use ($search) {
                $query->whereHas('product', function($query) use ($search) {
                    $query
                        ->whereLike('name', '%'. $search .'%')
                        ->orWhereLike('sku', '%'. $search .'%');
                });
            });
        });

        $query->when($product_id, function($query, $product_id) {
            $query->where('product_id', $product_id);
        });
    }

    /**
     * Get the product that owns the Product
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
