<?php

namespace App\Models\Litted;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Post extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'litted_posts';
    protected $fillable = [
        'author_id', 'community_id',
        'title', 'slug', 'url', 'body', 'votes'
    ];

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'title'],
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function character()
    {
        return $this->belongsTo(Character::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
