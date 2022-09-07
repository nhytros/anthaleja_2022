<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Patient;
use App\Models\Hospital\DoctorOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Billing extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_billings';
    protected $fillable = [
        'status', 'doctor_order_id', 'patient_visit_id',
        'created_by', 'updated_by',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_visit_id', 'id');
    }

    public function doctor_order()
    {
        return $this->belongsTo(DoctorOrder::class, 'doctor_order_id', 'id');
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
