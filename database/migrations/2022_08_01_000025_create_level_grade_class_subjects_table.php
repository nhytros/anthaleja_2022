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
        Schema::create('school_level_grade_class_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_id')->constrained('school_levels');
            $table->foreignId('grade_id')->constrained('school_grades');
            $table->foreignId('class_id')->constrained('school_classes');
            $table->foreignId('subject_id')->constrained('school_subjects');
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
        Schema::dropIfExists('school_level_grade_class_subjects');
    }
};
