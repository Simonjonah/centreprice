<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['user_type', 'amount', 'duration_in_days'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
