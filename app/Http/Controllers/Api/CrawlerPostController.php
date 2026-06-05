<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCrawlerPostRequest;
use App\Models\ScrapedPost;
use Illuminate\Http\Request;

class CrawlerPostController extends Controller
{
    public function store(StoreCrawlerPostRequest $request)
    {
        $data = $request->validated();

        $hash = md5(
            $data['source_url']
            . $data['title']
        );

        $client = $request->user();

        if (! $client->is_active) {
            abort(403);
        }

        $post = ScrapedPost::firstOrCreate(
            [
                'content_hash' => $hash,
            ],
            [
                ...$data,
                'content_hash' => $hash,
            ]
        );

        return response()->json([
            'success' => true,
            'id' => $post->id,
        ]);
    }
}
