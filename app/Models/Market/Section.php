<?php
namespace App\Models\Market;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\{HasSlug, SlugOptions};

class Section extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    public $table = 'shop_sections';
    protected $fillable = ['name', 'slug', 'status'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->allowDuplicateSlugs();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
