<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemainingDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_number',
        'professional_license_number',
        'state_of_licensure',
        'areas_of_expertise',
        'bio',
        'profile_picture',
        'work_address',
    ];
}
