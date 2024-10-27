<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = ['id'];

    public function getImageUrlAttribute()
    {
        return Storage::url($this->attributes['image']);
    }

    public function scopeFilter($query, array $filters)
    {
        $search      = $filters['search'] ?? false;
        $category_id = $filters['category_id'] ?? false;

        $query->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->whereLike('name', "%$search%")
                    ->orWhereLike('sku', "%$search%");
            });
        });

        $query->when($category_id, function ($query, $category_id) {
            $query->where('category_id', $category_id);
        });
    }

    /**
     * Get the category that owns the Product
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get the supplier that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
