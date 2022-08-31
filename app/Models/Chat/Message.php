<?php

namespace App\Models\Chat;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'chat_messages';
    protected $fillable = ['conversation_id', 'character_id', 'body', 'type'];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function character()
    {
        return $this->belongsTo(Character::class)
            ->withDefault(['name' => 'PG']);
    }

    public function recipients()
    {
        return $this->belongsToMany(Character::class, 'chat_recipients')
            ->withPivot(['read_at', 'deleted_at']);
    }
}
