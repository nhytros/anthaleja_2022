<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
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
        Schema::create('natter_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained('characters', 'id')->cascadeOnDelete();
            $table->foreignId('skill_id')->constrained('natter_skills', 'id')->cascadeOnDelete();
            $table->string('name');
            $table->string('image');
            $table->string('url')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
