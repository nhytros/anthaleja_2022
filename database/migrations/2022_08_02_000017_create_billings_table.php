<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Hospital\{BillingInvoice, BillingTransaction, DoctorOrder, Patient, PatientVisit};

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_billings', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('doctor_order_id')->nullable()->constrained('hospital_doctor_orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('patient_visit_id')->nullable()->constrained('hospital_patient_visits')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('hospital_billing_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_no');
            $table->decimal('total', 12, 2)->nullable()->default(0);
            $table->decimal('pending_amount', 12, 2)->nullable()->default(0);
            $table->decimal('payment_amount', 12, 2)->nullable()->default(0);
            $table->string('note')->nullable();
            $table->string('discount_type')->nullable();
            $table->decimal('discount_amount', 12, 2)->nullable()->default(0);
            $table->string('discount_note')->nullable();
            $table->decimal('tax', 10, 2)->nullable()->default(0);
            $table->decimal('additional_fee', 12, 2)->nullable()->default(0);
            $table->tinyInteger('mood')->nullable()->default(0);
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('patient_id')->nullable()->constrained('hospital_patients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('patient_visit_id')->nullable()->constrained('hospital_patient_visits')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('doctor_id')->nullable()->constrained('hospital_doctors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('hospital_billing_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('item_amount')->nullable()->default(0);
            $table->decimal('item_total_amount', 12, 2)->nullable()->default(0);
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('billing_invoice_id')->nullable()->constrained('hospital_billing_invoices')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('hospital_billing_transactions', function (Blueprint $table) {
            $table->id();
            $table->decimal('payment_amount', 12, 2)->nullable()->default(0);
            $table->boolean('mood')->nullable()->default(0);
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('patient_visit_id')->nullable()->constrained('hospital_billing_transactions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('billing_invoice_id')->nullable()->constrained('hospital_billing_invoices')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('characters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('hospital_cheque_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('number')->nullable()->default(0);
            $table->date('date');
            $table->boolean('status')->nullable()->default(0);
            $table->foreignId('billing_transaction_id')->nullable()->constrained('hospital_billing_transactions')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('hospital_cheque_details');
        Schema::dropIfExists('hospital_billing_transactions');
        Schema::dropIfExists('hospital_billing_invoice_details');
        Schema::dropIfExists('hospital_billing_invoices');
        Schema::dropIfExists('hospital_billings');
    }
};
