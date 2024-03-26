<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VueUser extends Model
{
    use HasFactory;
    protected $table = 'vue_users';
    protected $fillable = [
        'full_name',
        'email',
        'password'
    ];
}
