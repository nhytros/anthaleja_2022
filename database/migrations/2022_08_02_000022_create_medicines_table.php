<?php

use App\Models\Hospital\Purchase;
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
        Schema::create('hospital_medicines', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->decimal('price', 10, 2)->nullable()->default(0);
            $table->decimal('profit', 10, 2)->nullable()->default(0);
            $table->text('description')->nullable();
            $table->integer('available_qty')->nullable()->default(0);
            $table->integer('alert_qty')->nullable()->default(0);
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('purchase_id')->nullable()->constrained('hospital_purchases')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_medicines');
    }
};
