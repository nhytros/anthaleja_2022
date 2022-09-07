<?php

use App\Models\Character;
use App\Models\Hospital\Patient;
use App\Models\Hospital\PatientVisit;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_medical_certificates', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->boolean('finalized')->nullable()->default(0);
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('patient_id')->nullable()->constrained('hospital_patients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('patient_visit_id')->nullable()->constrained('hospital_patient_visits')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('doctor_id')->nullable()->constrained('hospital_doctors')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_medical_certificates');
    }
};
