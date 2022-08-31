<?php

namespace App\Models\Litted;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $table = 'litted_comments';
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
