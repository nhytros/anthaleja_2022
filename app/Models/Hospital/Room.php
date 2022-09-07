<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_rooms';
    protected $fillable = [
        'room_no', 'name', 'price', 'capacity', 'image', 'status',
        'ward_id', 'room_type_id', 'created_by', 'updated_by',
    ];
}
