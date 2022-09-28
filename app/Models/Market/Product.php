<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    public $table = 'shop_products';
    protected $fillable = [
        'section_id', 'category_id', 'brand_id', 'vendor_id',
        'name', 'code', 'color', 'price', 'discount', 'weight',
        'main_image', 'video', 'description',
        'meta_title', 'meta_description', 'meta_keywords',
        'is_featured', 'status'
    ];
    use HasFactory, SoftDeletes;

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
