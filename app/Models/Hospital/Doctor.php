<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Specialist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_doctors';
    protected $fillable = [
        'character_id', 'specialist_id', 'about', 'charge', 'experience', 'status',
        'created_by', 'updated_by',
    ];

    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id', 'id');
    }

    public function specialist()
    {
        return $this->belongsToMany(Specialist::class, 'specialist_id', 'id');
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
