<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'reg',
        'degree_1',
        'college_1',
        'degree_2',
        'college_2',
        'time',
        'chamber',
        'fee',
        'image',
    ];

    protected $hidden = [
        'email',
        'phone',
        'reg',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
