<?php

namespace App\Models\Litted;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    public $table = 'litted_post_votes';
    protected $fillable = ['character_id', 'post_id', 'vote'];
}
