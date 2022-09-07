<?php

namespace App\Models\Hospital;

use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodStock extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_blood_stocks';
    protected $fillable = ['blood_bank_id', 'created_by', 'updated_by',];
}
