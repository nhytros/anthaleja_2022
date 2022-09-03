<?php

namespace App\Models\School;

use App\Models\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "school_teachers";
    protected $fillable = ['character_id', 'roll_no', 'address', 'standard', 'avatar'];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
