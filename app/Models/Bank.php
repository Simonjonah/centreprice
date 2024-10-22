<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected  $fillable  = [
        'code',
        'bank_id',
        'name',
        'slug',
        'country',
        'type',
        'is_deleted',
        'currency',
        'createdAt',
        'longcode',
        'gateway',
        'pay_with_bank',
        'updatedAt',
    ];

    
}
