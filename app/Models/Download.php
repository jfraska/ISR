<?php

namespace App\Models;

use App\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Kilobyteno\LaravelUserGuestLike\Traits\HasUserGuestLike;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\HasStatuses;

class Download extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUserGuestLike, Commentable, HasStatuses;

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
        'published_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categoriable');
    }

    public function scopePublished($query)
    {
        $query->currentStatus('published')->where('is_published', true);
    }

    public function getReadingTime()
    {
        $content = "";
        foreach ($this->content as $item) {
            if (isset($item['type']) && $item['type'] === 'paragraph') {
                $content .= strip_tags($item['data']['content']);
            }
        }

        $mins = round(str_word_count($content) / 250);

        return ($mins < 1) ? 1 : $mins;
    }
}
