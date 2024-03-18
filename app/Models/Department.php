<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'member',
        'meta_description',
        'user_id'
    ];

    protected $casts = [
        'content' => 'array',
        'member' => 'array',
    ];
}
