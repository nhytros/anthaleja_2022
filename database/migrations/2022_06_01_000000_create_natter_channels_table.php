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
        Schema::create('natter_channels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained('characters', 'id')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->string('uid');
            $table->text('description')->nullable();
            $table->string('image_avatar')->nullable();
            $table->string('image_banner')->nullable();
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
        Schema::dropIfExists('channels');
    }
};
