<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Room;
use App\Models\Hospital\BedType;
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

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function bed_type()
    {
        return $this->belongsTo(BedType::class, 'bed_type_id', 'id');
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
