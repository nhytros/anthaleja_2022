<?php

namespace App\Models\Natter;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Post extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'natter_post_votes';
    protected $fillable = [
        'author_id', 'post_id',
        'com_vote', 'chn_like'
    ];
}
