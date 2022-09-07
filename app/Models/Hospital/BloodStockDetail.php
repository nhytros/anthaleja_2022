<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\BloodStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloodStockDetail extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_blood_stock_details';
    protected $fillable = [
        'unit', 'total', 'balance', 'blood_stock_id',
        'created_by', 'updated_by',
    ];

    public function blood_stocks()
    {
        return $this->hasMany(BloodStock::class, 'blood_stock_id', 'id');
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
