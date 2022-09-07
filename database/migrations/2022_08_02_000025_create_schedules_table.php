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
        Schema::create('hospital_schedules', function (Blueprint $table) {
            $table->id();
            $table->time('start');
            $table->time('end');
            $table->boolean('status')->nullable()->default(0);
            $table->string('available_days')->nullable();
            $table->string('note')->nullable();
            $table->foreignId('doctor_id')->nullable()->constrained('doctors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('hospital_schedules');
    }
};
