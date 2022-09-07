<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillingTransaction extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_billing_transactions';
    protected $fillable = [
        'payment_amount', 'mood', 'status', 'patient_visit_id', 'billing_invoice_id',
        'created_by', 'updated_by',
    ];
}
