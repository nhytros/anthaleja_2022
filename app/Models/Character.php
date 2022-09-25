<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use App\Models\Litted\Post;
use Illuminate\Support\Str;
use App\Models\Chat\Conversation;
use App\Models\Shop\{Shop, Product};
use Illuminate\Support\Facades\Auth;
use App\Models\School\{Course, Teacher, Student};
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use App\Models\Natter\{Channel, Image, Project, Video};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Character extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    protected $fillable = [
        'user_id', 'title', 'first_name', 'last_name', 'username',
        'gender', 'height', 'date_of_birth', 'thirst', 'hunger', 'energy',
        'bank_account', 'cash', 'bank_amount', 'metals', 'has_phone', 'phone_no',
        'status',
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

    // Natter
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

    public function channel()
    {
        return $this->hasOne(NatterChannel::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // School
    public function course()
    {
        return $this->belongsToMany(Course::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    // Other    
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

    public function getName($character = null)
    {
        // $user=User::with('characters')->where
        // $character = auth()->user()->character??;
        // if ($character->first_name && $character->last_name) {
        //     return $character->first_name . ' ' . $character->last_name;
        // }
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

    protected function name(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => Str::lower($value)
        );
    }

    protected function created_at(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->toDateTimeString(),
            set: fn ($value) => date('Y-m-d', strtotime($value))
        );
    }

    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : static::where('id', 'like', '%' . $search . '%')
            ->orWhere('username', 'like', '%' . $search . '%')
            ->orWhere('first_name', 'like', '%' . $search . '%')
            ->orWhere('last_name', 'like', '%' . $search . '%');
    }

    public function scopeGetActiveCharacterRoleAsTeacher($query, $uid)
    {
        // $user=Character::where('user_id',$uid)->first();
        // $role=$user->hasRole('teacher');
        // return $query->where('status',1)
        //     ->where('u')

        // get('id',)
    }
}
