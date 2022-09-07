<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Doctor;
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
        'payment_method', 'symtoms', 'image', 'status', 'character_id', 'doctor_id',
        'created_by', 'updated_by',
    ];

    public function character()
    {
        return $this->belongsTo(Character::class, 'created_by', 'id');
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
