<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipient extends Pivot
{
    use HasFactory, SoftDeletes;

    public $table = 'chat_recipients';
    public $timestamps = false;
    protected $casts = ['read_at' => 'datetime'];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
