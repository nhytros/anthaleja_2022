<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Immunization extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_immunizations';
    protected $fillable = [
        'name', 'patient_id', 'patient_visit_id', 'doctor_id',
        'created_by', 'updated_by',
    ];
}
