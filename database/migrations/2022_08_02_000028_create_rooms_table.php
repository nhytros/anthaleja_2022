<?php

use App\Models\Hospital\RoomType;
use App\Models\Hospital\Ward;
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
        Schema::create('hospital_room_types', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('hospital_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('room_no')->nullable();
            $table->string('name')->nullable();
            $table->decimal('price')->nullable()->default(0);
            $table->smallInteger('capacity')->nullable()->default(0);
            $table->string('image')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('ward_id')->nullable()->constrained('hospital_wards')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('room_type_id')->nullable()->constrained('hospital_room_types')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_rooms');
        Schema::dropIfExists('hospital_room_types');
    }
};
