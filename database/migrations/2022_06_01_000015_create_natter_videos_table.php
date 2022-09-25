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
        Schema::create('natter_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained('characters', 'id')->cascadeOnDelete();
            $table->string('video');
            $table->string('uid');
            $table->string('processed_file')->nullable();
            $table->enum('visibility', ['private', 'public', 'unlisted'])->default('private');
            $table->boolean('processed')->default(0);
            $table->boolean('allow_likes')->default(1);
            $table->boolean('allow_comments')->default(1);
            $table->integer('processing_percentage')->nullable();
            $table->integer('likes')->nullable()->default(0);
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
        Schema::dropIfExists('natter_videos');
    }
};
