<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'mood',
        'activities',
        'to_do_list',
        'notes',
    ];

    protected $casts = [
        'activities' => 'array',
    ];
}