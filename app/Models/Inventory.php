<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
