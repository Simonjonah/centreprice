<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use App\Jobs\DeletePendingUserJob;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'email',
        'password',
        'lname',
        'phone',
        'terms',
        'ref_no',
        'reference',
        'dob',
        'status',
        'user_id',
        'user_type',
        'lga_id',
        'ngstate_id',
        'address',
        'gender',
        'city',
        'amount',
        'end_date',
        'start_date',
        'agree',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    


//protected $appends = ['referral_link'];

/**
 * The accessors to append to the model's array form.
 *
 * @var array
 */
protected $appends = ['referral_link'];
protected $ref = ['vendorreferral_link'];

/**
 * Get the user's referral link.
 *
 * @return string
 */
public function getReferralLinkAttribute()
{
    return url('/registerdistributor/'. $this->Lga['lga'] . '/' . $this->ngstate['state'] . '/' . $this->Lga->district['districts'] . '/' . $this->ref_no);
}

public function getVendorReferralLinkAttribute()
{
    return url('/referregistervendor/'. $this->Lga['lga'] . '/' . $this->ngstate['state'] . '/' . $this->Lga->district['districts'] . '/' . $this->ref_no3);
}



public function ngstate(): BelongsTo
{
    return $this->belongsTo(Ngstate::class);
}

    public function Lga(): BelongsTo
    {
        return $this->belongsTo(Lga::class, 'lga_id', 'id');
    }


    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

    
}
