<?php

namespace App\Models\Hospital;

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
        'created_by', 'updated_by',
    ];
}
