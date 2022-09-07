<?php

use App\Models\Hospital\Investigation;
use App\Models\Hospital\Laboratory;
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
        Schema::create('hospital_sample_collections', function (Blueprint $table) {
            $table->id();
            $table->string('sample_code')->nullable();
            $table->dateTime('collect_date')->nullable();
            $table->dateTime('dispatch_date')->nullable();
            $table->dateTime('cancel_dispatch_date')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('investigation_id')->nullable()->constrained('hospital_investigations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('laboratory_id')->nullable()->constrained('hospital_laboratories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('approved_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_sample_collections');
    }
};
