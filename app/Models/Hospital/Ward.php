<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Ward extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_wards';
    protected $fillable = [
        'code', 'name', 'status',
        'created_by', 'updated_by'
    ];

    public function createdBy()
    {
        return $this->belongsTo(Character::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Character::class, 'updated_by', 'id');
    }
}
