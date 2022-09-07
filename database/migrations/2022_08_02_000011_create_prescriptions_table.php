<?php

use App\Models\Character;
use App\Models\Hospital\{Medicine, Patient, PatientVisit};
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
        Schema::create('hospital_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('dosage')->nullable();
            $table->string('frequency')->nullable();
            $table->string('duration')->nullable();
            $table->string('food_relation')->nullable();
            $table->string('route')->nullable();
            $table->text('instructions')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('patient_id')->nullable()->constrained('hospital_patients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('patient_visit_id')->nullable()->constrained('hospital_patient_visits')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('doctor_id')->nullable()->constrained('hospital_doctors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('medicine_id')->nullable()->constrained('hospital_medicines')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_prescriptions');
    }
};
