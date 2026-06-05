<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = [
        'name',
        'display_name',
        'slug',
        'description',
        'image',
        'base_url',
        'type',
        'is_active',
        'priority',
        'crawl_interval',
    ];
    public function pages()
    {
        return $this->hasMany(SourcePage::class);
    }

    public function posts()
    {
        return $this->hasMany(ScrapedPost::class);
    }

    public function scrapedPosts()
    {
        return $this->hasMany(ScrapedPost::class);
    }
}
