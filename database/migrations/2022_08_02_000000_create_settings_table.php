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
        Schema::create('hospital_settings', function (Blueprint $table) {
            $table->id();

            // Basic Informations
            $table->string('name')->nullable();
            $table->string('website')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('size')->nullable();
            $table->string('type')->nullable();

            // Social media
            $table->string('natter')->nullable();

            // Invoice Settings
            $table->string('invoice_prefix')->nullable();
            $table->string('invoice_logo')->nullable();
            $table->string('user_prefix')->nullable();
            $table->string('patient_prefix')->nullable();
            $table->string('invoice_number_mood')->nullable();
            $table->string('invoice_last_number')->nullable();

            // Tax Settings
            $table->decimal('taxes', 6, 2)->nullable()->default(0);
            $table->decimal('discount', 6, 2)->nullable()->default(0);

            // Dates
            $table->date('founded_at')->nullable();
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
        Schema::dropIfExists('hospital_settings');
    }
};
