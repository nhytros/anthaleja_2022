<?php

namespace App\Models\Hospital;

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
}
