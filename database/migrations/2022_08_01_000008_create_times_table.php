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
        Schema::create('school_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shift_id')->constrained('school_shifts')->nullable();
            $table->string('name');
            $table->string('code');
            $table->string('start');
            $table->string('end');
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
        Schema::dropIfExists('school_times');
    }
};
