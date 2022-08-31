<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wiki extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['character_id', 'title', 'slug', 'body'];

    public function character()
    {
        return $this->belongsToMany(Character::class, null, 'page_id');
    }
}
