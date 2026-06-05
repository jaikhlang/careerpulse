<?php

namespace App\Observers;

use App\Jobs\GenerateArticle;
use App\Models\ScrapedPost;

class ScrapedPostObserver
{
    /**
     * Handle the ScrapedPost "created" event.
     */
    public function created(ScrapedPost $post): void
    {
        GenerateArticle::dispatch($post);
    }

    /**
     * Handle the ScrapedPost "updated" event.
     */
    public function updated(ScrapedPost $scrapedPost): void
    {
        //
    }

    /**
     * Handle the ScrapedPost "deleted" event.
     */
    public function deleted(ScrapedPost $scrapedPost): void
    {
        //
    }

    /**
     * Handle the ScrapedPost "restored" event.
     */
    public function restored(ScrapedPost $scrapedPost): void
    {
        //
    }

    /**
     * Handle the ScrapedPost "force deleted" event.
     */
    public function forceDeleted(ScrapedPost $scrapedPost): void
    {
        //
    }
}
