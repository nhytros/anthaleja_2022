<?php

namespace App\Models\Hospital;

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
}
