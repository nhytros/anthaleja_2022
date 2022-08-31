<?php

namespace App\Models;

use App\Models\Shop\{Shop, Product};
use App\Models\Chat\Conversation;
use App\Models\Litted\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Character extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'username', 'gender', 'height',
        // 'bank_account', 'cash', 'bank_amount', 'metals',
        'thirst', 'hunger', 'energy', 'status',
        // 'has_phone', 'phone_no'
    ];

    public function id(): int|false
    {
        if (self::check()) {
            return Auth::user()->character->id;
        }
        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wikipages()
    {
        return $this->hasMany(Wiki::class, 'character_id', 'page_id');
    }

    public function shop()
    {
        return $this->hasOne(Shop::class);
    }

    public function items()
    {
        return $this->belongsToMany(Product::class, 'character_product')
            ->withPivot('quantity');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'chat_participants')
            ->withPivot(['role', 'joined_at']);
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'character_id', 'id');
    }

    public function receivedMessages()
    {
        return $this->belongsToMany(Message::class, 'chat_recipients')
            ->withPivot(['read_at', 'deleted_at']);
    }

    public function check()
    {
        if (Auth::check()) {
            if (Auth::user()->character) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function getName()
    {
        $character = auth()->user()->character;
        if ($character->first_name && $character->last_name) {
            return $character->first_name . ' ' . $character->last_name;
        }
    }

    public function getUsername()
    {
        return auth()->user()->character->username;
    }

    public function DecreaseStatus()
    {
        if (Auth::check()) {
            $status = Character::find(Auth::user()->character->id);
            $status->update([
                'energy' => $status->energy -= 1,
                'hunger' => $status->hunger -= .5,
                'thirst' => $status->thirst -= .25,
            ]);
        }
    }
}
