<?php

namespace App\Models\Natter;

use App\Models\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    public $table = "natter_videos";
    protected $fillable = [
        'character_id', 'image', 'uid', 'processed_file',
        'visibility', 'processed', 'allow_likes', 'allow_comments',
        'processing_percentage'
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
