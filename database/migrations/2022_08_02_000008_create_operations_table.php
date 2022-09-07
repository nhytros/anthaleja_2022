<?php

use App\Models\Character;
use App\Models\Hospital\{OperationType, Patient};
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
        Schema::create('hospital_operation_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('hospital_operations', function (Blueprint $table) {
            $table->id();
            $table->date('operation_date');
            $table->time('operation_time');
            $table->decimal('amount', 12, 2)->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('operation_type_id')->nullable()->constrained('hospital_operation_types')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_operations');
        Schema::dropIfExists('hospital_operation_types');
    }
};
