<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_prescriptions';
    protected $fillable = [
        'dosage', 'frequency', 'duration', 'food_relation', 'route', 'instructions',
        'status', 'patient_id', 'patient_visit_id', 'doctor_id', 'medicine_id',
        'created_by', 'updated_by',
    ];
}
