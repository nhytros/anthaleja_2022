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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name', 48);
            $table->string('last_name', 48);
            $table->string('username', 96);
            $table->string('gender', 1);
            $table->unsignedTinyInteger('height')->nullable();
            $table->unsignedInteger('thirst')->nullable()->default(0);
            $table->unsignedInteger('hunger')->nullable()->default(0);
            $table->unsignedInteger('energy')->nullable()->default(100);
            $table->boolean('status')->nullable()->default(true);
            $table->string('bank_account', 12);
            $table->decimal('cash', 64, 2)->nullable()->default(0);
            $table->decimal('bank_amount', 64, 2)->nullable()->default(500);
            $table->unsignedInteger('metals')->nullable()->default(0);
            $table->boolean('has_phone')->nullable()->default(true);
            $table->string('phone_no', 8)->nullable();
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
        Schema::dropIfExists('user_characters');
        Schema::dropIfExists('characters');
    }
};
