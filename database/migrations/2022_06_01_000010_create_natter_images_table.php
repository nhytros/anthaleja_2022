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
        Schema::create('natter_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id', 'characters', 'id');
            $table->string('image');
            $table->string('uid');
            $table->enum('visibility', ['private', 'public', 'unlisted'])->default('private');
            $table->boolean('allow_likes')->default(1);
            $table->boolean('allow_comments')->default(1);
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
        Schema::dropIfExists('natter_images');
    }
};
