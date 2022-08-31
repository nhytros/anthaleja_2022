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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('character_id');
            $table->json('items')->nullable();
            $table->string('bank_account', 12);
            $table->unsignedDecimal('cash', 20, 2)->nullable()->default(0);
            $table->unsignedDecimal('bank_amount', 20, 2)->nullable()->default(0);
            $table->unsignedBigInteger('metals')->nullable()->default(0);
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
        Schema::dropIfExists('inventories');
    }
};
