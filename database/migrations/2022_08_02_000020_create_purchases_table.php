<?php

use App\Models\Hospital\{MedicineCategory, MedicineType, Supplier};
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
        Schema::create('hospital_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->tinyInteger('type');

            // Medicine
            $table->string('medicine_generic_name')->nullable();
            $table->string('medicine_unit')->nullable();
            $table->string('medicine_strenght')->nullable();
            $table->string('medicine_shelf')->nullable();

            // Quantity & Prices
            $table->unsignedBigInteger('quantity')->nullable()->default(0);
            $table->string('quantity_type')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->date('expiration_date')->nullable();
            $table->text('note')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('medicine_type_id')->nullable()->constrained('hospital_medicine_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('medicine_category_id')->nullable()->constrained('hospital_medicine_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('supplier_id')->nullable()->constrained('hospital_suppliers')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_purchases');
    }
};
