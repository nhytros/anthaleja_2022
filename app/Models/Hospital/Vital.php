<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Doctor;
use App\Models\Hospital\Patient;
use App\Models\Hospital\PatientVisit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vital extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_vitals';
    protected $fillable = [
        'avpu', 'blood_sugar_f', 'blood_sugar_r', 'bmi', 'comments', 'diastolic_BP', 'doctor_id',
        'heart_rate', 'height', 'mobility', 'oxygen_supplementation', 'patient_id', 'patient_visit_id',
        'respiratory', 'spo2', 'status', 'systolic_BP', 'temperature', 'trauma', 'urine_output', 'weight',
        'created_by', 'updated_by'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function patient_visit()
    {
        return $this->belongsTo(PatientVisit::class, 'patient_visit_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
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
