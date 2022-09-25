<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('natter_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('characters', 'id');
            $table->foreignId('community_id')->constrained('natter_communities', 'id')->nullable();
            $table->foreignId('image_id')->constrained('natter_images', 'id')->nullable();
            $table->foreignId('video_id')->constrained('natter_videos', 'id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('url')->nullable();
            $table->text('body');
            $table->integer('votes')->nullable();
            $table->integer('likes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('natter_posts');
    }
};
