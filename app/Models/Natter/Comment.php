<?php

namespace App\Models\Natter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    public $table = 'natter_comments';
    protected $fillable = ['author_id', 'post_id', 'comment'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function character()
    {
        return $this->belongsTo(Character::class, 'author_id');
    }
}
