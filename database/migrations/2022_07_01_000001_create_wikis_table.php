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
        Schema::create('wikis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('character_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->longText('body');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('character_wiki', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id');
            $table->unsignedBigInteger('character_id')->nullable();
            $table->foreign('page_id')->references('id')->on('wikis');
            $table->foreign('character_id')->references('id')->on('characters')->nullOnDelete();
            // $table->foreignId('page_id')->constrained('wikis');
            // $table->foreignId('character_id')->constrained('characters')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wikis');
        Schema::dropIfExists('character_wiki');
    }
};
