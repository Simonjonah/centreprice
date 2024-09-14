<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Sale extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'first_name', 
        'last_name', 
        'amount', 
        'email', 
        'phone', 
        'franchise_commission', 
        'distributors_commission', 
        'vendors_commission', 
        'order_id', 
        'product_id', 
        'franchise_id', 
        'distributor_id', 
        'vendor_id', 
        'franchise_id', 
        'reference', 
        'productname', 
        'images1', 
        'images2', 
        'images3', 
        'images4', 
        'images4', 
        'images5', 
        'ref_no', 
        'quantity', 

        'status',
    ];



    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

}
