<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Ward;
use App\Models\Hospital\RoomType;
use App\Models\Hospital\Supplier;
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

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id', 'id');
    }

    public function room_type()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id', 'id');
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
