<?php

namespace App\Models\Natter;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channel extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'natter_channels';
    protected $fillable = [
        'character_id', 'name', 'slug', 'uid', 'description',
        'image_avatar', 'image_banner'
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
