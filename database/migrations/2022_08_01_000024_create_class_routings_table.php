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
        Schema::create('school_class_routings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_id')->nullable();
            $table->foreignId('grade_id')->nullable();
            $table->foreignId('class_id')->nullable();
            $table->foreignId('session_id')->nullable();
            $table->foreignId('subject_id')->nullable();
            $table->foreignId('day_id')->nullable();
            $table->foreignId('shift_id')->nullable();
            $table->foreignId('time_id')->nullable();
            $table->foreignId('section_id')->nullable();
            $table->foreignId('teacher_id')->nullable();
            // Status: 0=Disabled, 1=Enabled, 2=Archived
            $table->tinyInteger('status')->nullable()->default(1);
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
        Schema::dropIfExists('school_class_routings');
    }
};
