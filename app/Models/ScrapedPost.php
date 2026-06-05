<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScrapedPost extends Model
{

    protected $fillable = [
        'source_id',
        'source_page_id',
        'title',
        'source_url',
        'content',
        'published_at',
        'content_hash',
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function sourcePage()
    {
        return $this->belongsTo(SourcePage::class);
    }
}
