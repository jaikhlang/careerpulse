<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class CrawlerClient extends Model
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];
}
