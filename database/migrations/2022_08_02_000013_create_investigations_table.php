<?php

use App\Models\Character;
use App\Models\Hospital\Patient;
use App\Models\Hospital\TestType;
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
        Schema::create('hospital_investigations', function (Blueprint $table) {
            $table->id();
            $table->string('statistic')->nullable();
            $table->boolean('ot_required')->nullable()->default(0);
            $table->string('result')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('test_type_id')->nullable()->constrained('hospital_test_types')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_investigations');
    }
};
