<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_medicines';
    protected $fillable = [
        'code', 'name', 'price', 'profit',
        'description', 'available_qty', 'alert_qty', 'status',
        'purchase_id', 'created_by', 'updated_by',
    ];
}
