<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    public $table = 'shop_categories';
    protected $fillable = [
        'parent_id', 'section_id', 'name',
        'image', 'discount', 'description', 'url',
        'meta_title', 'meta_description', 'meta_keywords', 'status'
    ];
    use HasFactory, SoftDeletes;
}
