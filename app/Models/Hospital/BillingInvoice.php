<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillingInvoice extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_billing_invoices';
    protected $fillable = [
        'invoice_no', 'total', 'pending_amount', 'payment_amount',
        'note', 'discount_type', 'discount_amount', 'discount_note', 'mood',
        'tax', 'additional_fee', 'status', 'patient_id', 'patient_visit_id',
        'doctor_id', 'created_by', 'updated_by',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_visit_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Patient::class, 'doctor_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(Character::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Character::class, 'updated_by', 'id');
    }
}
