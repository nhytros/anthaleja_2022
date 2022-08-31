<?php

namespace App\Models\Shop;

use App\Models\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    public $table = 'shops';
    protected $fillable = ['character_id', 'name', 'website', 'bank_account', 'bank_amount', 'license_number'];

    use HasFactory, SoftDeletes;

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
