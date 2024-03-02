<?php

namespace App\Models;

use App\Models\Country;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Billable;


    protected $fillable = [
        'name',
        'is_admin',
        'professional_title',
        'email',
        'verification_token',
        'is_verified',
        'password',
        'status'
    ];
    public function country()
{
    return $this->belongsTo(Country::class);
}


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
