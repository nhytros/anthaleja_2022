<?php

namespace App\Models\Natter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'natter_skills';
    protected $fillable = ['name', 'image'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
