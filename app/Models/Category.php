<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'bg_color',
        'text_color',
        'meta_description'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
