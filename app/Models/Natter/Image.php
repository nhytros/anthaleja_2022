<?php

namespace App\Models\Natter;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public $table = "natter_images";
    protected $fillable = [
        'character_id', 'image', 'uid', 'visibility',
        'allow_likes', 'allow_comments'
    ];

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
