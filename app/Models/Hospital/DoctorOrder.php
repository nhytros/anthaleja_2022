<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Doctor;
use App\Models\Hospital\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorOrder extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_doctor_orders';
    protected $fillable = [
        'order_no', 'order_type', 'status', 'patient_visit_id', 'doctor_id',
        'approved_by', 'created_by', 'updated_by',
    ];

    public function patient_visit()
    {
        return $this->hasMany(Patient::class, 'patient_visit_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function approvedBy()
    {
        return $this->belongsTo(Character::class, 'created_by', 'id');
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
