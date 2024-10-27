<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Branch extends Model
{
    use SoftDeletes;

    protected $table = 'branches';
    protected $guarded = ['id'];

    public function getImageUrlAttribute()
    {
        return Storage::url($this->attributes['image']);
    }

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? false;
        $region = $filters['region'] ?? false;

        $query->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->whereLike('name', "%$search%");
            });
        });

        $query->when($region, function ($query, $region) {
            $query->where('region', $region);
        });
    }
}
