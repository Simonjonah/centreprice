<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subaccount extends Model
{
    use HasFactory;

    protected $fillable = ['percentage_charge', 'account_number', 'settlement_bank', 'subaccount_code', 'business_name', 'share'];

    
}
