<?php

use App\Models\Character;
use App\Models\Hospital\Doctor;
use App\Models\Hospital\Patient;
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
        Schema::create('hospital_patients', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->nullable();
            $table->date('registration_date')->nullable();
            $table->boolean('referral')->nullable()->comment('1: Yes, 0: no');
            $table->string('referred_by')->nullable();
            $table->tinyInteger('patient_type')->nullable()->comment('1: Inpatient, 2: Outpatient');
            $table->string('marital_status')->nullable()->comment('S: Single, D: Divorced, M: Married, W: Widow');
            $table->string('blood_group')->nullable();
            $table->string('occupation')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);

            // Payment method
            $table->tinyInteger('payment_method')->nullable()->default(1)->comment('1: Cash, 2: Bank');

            $table->text('symtoms')->nullable();
            $table->string('image')->nullable();

            $table->foreignId('doctor_id')->constrained('hospital_doctors')->comment('the character_id is the Doctor in this table');
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('hospital_patient_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visit_no');
            $table->string('visit_type');
            $table->date('visit_date');
            $table->tinyInteger('visit_status')->nullable()->default(0)->comment('when complete, the status will change');
            $table->text('description')->nullable;
            $table->foreignId('patient_id')->nullable()->constrained('hospital_patients')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_patient_visits');
        Schema::dropIfExists('hospital_patients');
    }
};
