<?php

namespace App\Models\Chat;

use App\Models\Character;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participants extends Pivot
{
    use HasFactory;

    public $table = 'chat_participants';
    protected $timestamps = false;
    protected $casts = ['joined_at' => 'datetime'];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
