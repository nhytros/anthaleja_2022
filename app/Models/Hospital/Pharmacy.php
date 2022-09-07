<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacy extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_pharmacies';
    protected $fillable = [
        'code', 'name', 'email', 'phone', 'status',
        'branch_id', 'created_by', 'updated_by',
    ];

    public function branch()
    {
        return $this->hasMany(Branch::class, 'branch_id', 'id');
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
