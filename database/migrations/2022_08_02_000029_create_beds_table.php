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
        Schema::create('hospital_bed_types', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('hospital_beds', function (Blueprint $table) {
            $table->id();
            $table->integer('bed_no')->nullable();
            $table->string('name')->nullable();
            $table->decimal('price', 12, 2)->nullable()->default(0);
            $table->string('image')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('room_id')->nullable()->constrained('hospital_rooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('bed_type_id')->nullable()->constrained('hospital_bed_types')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_beds');
        Schema::dropIfExists('hospital_bed_types');
    }
};
