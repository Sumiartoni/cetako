<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'featured_image',
        'meta_title', 'meta_description', 'meta_keywords',
        'status', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
            if (empty($article->meta_title)) {
                $article->meta_title = $article->title;
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->whereNotNull('published_at');
    }

    public function getFormattedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('d M Y') : '-';
    }
}
