<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_patients';
    protected $fillable = [
        'registration_no', 'registration_date', 'referral', 'referred_by', 'patient_type',
        'marital_status', 'blood_group', 'occupation', 'father_name', 'mother_name',
        'payment_method', 'symtoms', 'image', 'status', 'patient_id', 'doctor_id',
        'created_by', 'updated_by',
    ];
}
