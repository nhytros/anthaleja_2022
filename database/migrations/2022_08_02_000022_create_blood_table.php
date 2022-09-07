<?php

use App\Models\Hospital\BloodBank;
use App\Models\Hospital\BloodStock;
use App\Models\Hospital\Patient;
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
        Schema::create('hospital_blood_donors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('hospital_blood_requests', function (Blueprint $table) {
            $table->id();
            $table->string('reason')->nullable();
            $table->string('blood_type')->nullable();
            $table->integer('unit')->nullable()->default(0);
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('patient_id')->nullable()->constrained('hospital_patients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('hospital_blood_banks', function (Blueprint $table) {
            $table->id();
            $table->string('blood_type');
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('patient_id')->nullable()->constrained('hospital_patients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('doctor_id')->nullable()->constrained('hospital_doctors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('hospital_blood_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blood_bank_id')->nullable()->constrained('hospital_blood_banks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('hospital_blood_stock_details', function (Blueprint $table) {
            $table->id();
            $table->integer('unit')->nullable()->default(0);
            $table->integer('total')->nullable()->default(0);
            $table->integer('balance')->nullable()->default(0);
            $table->foreignId('blood_stock_id')->nullable()->constrained('hospital_blood_stocks')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_blood_stock_details');
        Schema::dropIfExists('hospital_blood_stocks');
        Schema::dropIfExists('hospital_blood_banks');
        Schema::dropIfExists('hospital_blood_requests');
        Schema::dropIfExists('hospital_blood_donors');
    }
};
