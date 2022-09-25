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
        Schema::create('natter_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('characters', 'id');
            $table->foreignId('post_id')->constrained('natter_posts', 'id');
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('litted_comments');
    }
};
