<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
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
        'name',
        'email',
        'password',
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

/**
 * Get the user's referral link.
 *
 * @return string
 */
public function getReferralLinkAttribute()
{
    return url('/registervendor/' . $this->ngstate['state'] . '/' . $this->Lga->district['districts'] . '/' . $this->Lga['lga'] . '/' . 'ref=' . $this->ref_no);
    // return $this->referral_link = route('registervendor', ['ref' => $this->ref_no]);
}



public function ngstate(): BelongsTo
{
    return $this->belongsTo(Ngstate::class);
}

    public function Lga(): BelongsTo
    {
        return $this->belongsTo(Lga::class, 'lga_id', 'id');
    }

}
