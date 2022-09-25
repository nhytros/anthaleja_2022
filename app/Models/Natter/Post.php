<?php

namespace App\Models\Natter;

use App\Models\Character;
use Spatie\Sluggable\{HasSlug, SlugOptions};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Post extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    public $table = 'natter_posts';
    protected $fillable = [
        'author_id', 'community_id', 'image_id', 'video_id',
        'title', 'slug', 'url', 'body', 'votes'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->allowDuplicateSlugs();
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
