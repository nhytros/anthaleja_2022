<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Billing;
use App\Models\Hospital\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillingTransaction extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_billing_transactions';
    protected $fillable = [
        'payment_amount', 'mood', 'status',
        'patient_visit_id', 'billing_id',
        'created_by', 'updated_by',
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class, 'patient_visit_id', 'id');
    }

    public function billings()
    {
        return $this->hasMany(Billing::class, 'billing_id', 'id');
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
