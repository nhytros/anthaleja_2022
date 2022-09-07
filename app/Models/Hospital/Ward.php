<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ward extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_wards';
    protected $fillable = ['code', 'name', 'status', 'created_by', 'updated_by'];
}
