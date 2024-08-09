<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lga extends Model
{
    use HasFactory;




    public function ngstate(): BelongsTo
    {
        return $this->belongsTo(Ngtate::class, 'state');
    }
}
