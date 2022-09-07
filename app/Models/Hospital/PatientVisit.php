<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientVisit extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_patient_visits';
    protected $fillable = [
        'visit_no', 'visit_type', 'visit_date', 'visit_status', 'description',
        'status', 'patient_id', 'doctor_id', 'created_by', 'updated_by',
    ];
}
