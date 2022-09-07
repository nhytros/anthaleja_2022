<?php

namespace App\Models\Hospital;

use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalCertificate extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_medical_certificates';
    protected $fillable = [
        'content', 'finalized', 'status',
        'patient_id', 'patient_visit_id', 'doctor_id',
        'created_by', 'updated_by',
    ];
}
