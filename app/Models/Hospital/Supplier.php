<?php

namespace App\Models\Hospital;

use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_suppliers';
    protected $fillable = [
        'product_id', 'company_id', 'description', 'status', 'character_id',
        'created_by', 'updated_by '
    ];
}
