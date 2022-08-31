<?php

namespace App\Models\Chat;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    public $table = 'chat_conversations';
    protected $fillable = ['character_id', 'label', 'type', 'last_message_id'];

    public function participants()
    {
        return $this->belongsToMany(Character::class, 'chat_participants')
            ->withPivot(['joined_at', 'role']);
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'conversation_id', 'id')
            ->latest();
    }

    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id', 'id');
    }

    public function lastMessage()
    {
        return $this->belongsTo(Message::class, 'last_message_id', 'id')
            ->withDefault();
    }
}
