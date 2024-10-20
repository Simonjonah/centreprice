<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Subscription extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['reference', 'user_type', 'user_id', 'amount', 'start_date', 'end_date', 'status'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

   

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function isExpired()
    {
        return Carbon::now()->gt($this->ends_at);
    }

}
