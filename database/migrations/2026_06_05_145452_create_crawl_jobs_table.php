<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('crawl_jobs', function (Blueprint $table) {
            $table->id();
             $table->foreignId('crawler_client_id')
        ->nullable();

            $table->string('source');

            $table->string('status');

            $table->integer('posts_found')
                ->default(0);

            $table->integer('posts_created')
                ->default(0);

            $table->text('error')
                ->nullable();

            $table->timestamp('started_at');

            $table->timestamp('finished_at')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crawl_jobs');
    }
};
