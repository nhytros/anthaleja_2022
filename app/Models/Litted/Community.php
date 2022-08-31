<?php

namespace App\Models\Litted;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Community extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'litted_communities';
    protected $fillable = ['owner_id', 'name', 'description', 'slug'];

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name'],
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
