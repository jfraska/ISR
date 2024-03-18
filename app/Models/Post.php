<?php

namespace App\Models;

use App\Traits\Commentable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Kilobyteno\LaravelUserGuestLike\Traits\HasUserGuestLike;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\ModelStatus\HasStatuses;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;
    use HasUserGuestLike;
    use Commentable;
    use HasStatuses;

    const ARTICLE = 'Article';
    const NEWS = 'News';
    const MINI_BLOG = 'Mini Blog';

    const CATEGORY = [
        self::ARTICLE => 'Article',
        self::NEWS => 'News',
        self::MINI_BLOG => 'Mini Blog',
    ];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category',
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

    public function excerpt(): string
    {
        $content = "";
        foreach ($this->content as $item) {
            if (isset($item['type']) && $item['type'] === 'paragraph') {
                $content .= strip_tags($item['data']['content']);
            }
        }

        return Str::words(strip_tags($content), 200, '...');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        $query->currentStatus('published')->where('is_published', true);
    }

    public function scopeSearch($query, string $search = '')
    {
        $query->where('title', 'like', "%{$search}%");
    }

    public function scopeWithTag($query, string $tag)
    {
        $query->whereHas('tags', function ($query) use ($tag) {
            $query->where('slug', $tag);
        });
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
