<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorOrder extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_doctor_orders';
    protected $fillable = [
        'order_no', 'order_type', 'status', 'patient_visit_id', 'doctor_id', 'approved_by',
        'created_by', 'updated_by',
    ];
}
