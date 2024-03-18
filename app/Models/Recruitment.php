<?php

namespace App\Models;

use App\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kilobyteno\LaravelUserGuestLike\Traits\HasUserGuestLike;
use Spatie\ModelStatus\HasStatuses;

class Recruitment extends Model
{
    use HasFactory;
    use HasUserGuestLike;
    use Commentable;
    use HasStatuses;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_published',
        'published_at',
        'meta_description',
        'user_id'
    ];

    protected $casts = [
        'content' => 'array',
    ];
}
