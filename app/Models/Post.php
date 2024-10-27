<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Storage;

class Post extends Model
{
    protected $table = 'posts';
    protected $guarded = ['id'];

    public function getImageUrlAttribute()
    {
        return Storage::url($this->attributes['image']);
    }

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? false;

        $query->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->whereLike('title', "%$search%");
            });
        });
    }

    public function scopePublished($query)
    {
        $query->where('is_published', 1);
    }

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
