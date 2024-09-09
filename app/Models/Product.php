<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'productname'
            ]
        ];
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function root(): BelongsTo
    {
        return $this->belongsTo(Root::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
