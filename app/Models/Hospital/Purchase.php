<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\MedicineType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Hospital\MedicineCategory;

class Purchase extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_purchases';
    protected $fillable = [
        'code', 'name', 'type',
        'medicine_generic_name', 'medicine_unit', 'medicine_strenght', 'medicine_shelf',
        'quantity', 'quantity_type', 'price', 'expiration_date', 'image', 'note',
        'status', 'medicine_type_id', 'medicine_category_id', 'supplier_id',
        'created_by', 'updated_by',
    ];

    public function medicine_type()
    {
        return $this->belongsTo(MedicineType::class, 'medicine_type_id', 'id');
    }

    public function medicine_category()
    {
        return $this->belongsTo(MedicineCategory::class, 'medicine_category_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
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
