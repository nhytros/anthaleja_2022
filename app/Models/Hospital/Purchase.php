<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
