<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloodRequest extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_blood_requests';
    protected $fillable = [
        'reason', 'blood_type', 'unit', 'status', 'patient_id',
        'created_by', 'updated_by',
    ];
}
