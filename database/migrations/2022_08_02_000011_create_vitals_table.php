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
        Schema::create('hospital_vitals', function (Blueprint $table) {
            $table->id();
            $table->string('systolic_BP')->nullable();
            $table->string('diastolic_BP')->nullable();
            $table->decimal('temperature', 6, 2)->nullable();
            $table->decimal('weight', 6, 2)->nullable();
            $table->integer('height')->nullable();
            $table->string('bmi')->nullable();
            $table->string('respiratory')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('urine_output')->nullable();
            $table->string('blood_sugar_f')->nullable();
            $table->string('blood_sugar_r')->nullable();
            $table->decimal('spo2', 6, 2)->nullable();
            $table->string('avpu')->nullable();
            $table->string('trauma')->nullable();
            $table->string('mobility')->nullable();
            $table->string('oxygen_supplementation')->nullable();
            $table->text('comments')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('patient_id')->constrained('hospital_patients', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('patient_visit_id')->constrained('hospital_patient_visits', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('doctor_id')->constrained('hospital_doctorss', 'id')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_vitals');
    }
};
