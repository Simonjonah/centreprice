<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lga extends Model
{
    use HasFactory;




    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
