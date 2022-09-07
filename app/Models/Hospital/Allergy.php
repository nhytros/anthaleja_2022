<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allergy extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'hospital_allergies';
}
