<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Brand extends Model
{
    public $table = 'shop_brands';
    protected $fillable = ['name', 'status'];

    use HasFactory, SoftDeletes;
}
