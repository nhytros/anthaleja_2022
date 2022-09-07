<?php

namespace App\Models\Hospital;

use App\Models\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nurse extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_nurses';
    protected $fillable = [
        'character_id', 'specialist_id', 'about', 'experience', 'status',
        'created_by', 'updated_by',
    ];

    public function character()
    {
        return $this->belongsTo(Character::class, 'created_by', 'id');
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
