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
        Schema::create('hospital_allergies', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->boolean('status')->nullable()->default(0);
            // $table->foreignIdFor(Patient::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignIdFor(PatientVisit::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignIdFor(Character::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('hospital_allergies');
    }
};
