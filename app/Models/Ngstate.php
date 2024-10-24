<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Ngstate extends Model
{
    use HasFactory;
    
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'state',
        // 'user_id',
 
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


 

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }


    public function lgas(): HasMany
    {
        return $this->hasMany(Lga::class);
    }
   
    public function districts(): HasMany 
    {
        return $this->hasMany(District::class);
    }


    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

}
