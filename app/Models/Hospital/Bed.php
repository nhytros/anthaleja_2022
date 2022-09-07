<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bed extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_beds';
    protected $fillable = [
        'bed_no', 'name', 'price', 'capacity', 'image', 'status',
        'room_id', 'bed_type_id', 'created_by', 'updated_by',
    ];
}
