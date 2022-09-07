<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Doctor;
use App\Models\Hospital\OperationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operation extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_nurses';
    protected $fillable = [
        'operation_date', 'operation_time', 'amount', 'description', 'status',
        'operation_type_id', 'patient_id', 'doctor_id',
        'created_by', 'updated_by',
    ];

    public function operation_type()
    {
        return $this->belongsTo(OperationType::class, 'operation_type_id', 'id');
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
