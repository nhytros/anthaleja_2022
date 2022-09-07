<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Shop\Shop;
use App\Models\Shop\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_suppliers';
    protected $fillable = [
        'product_id', 'company_id', 'description', 'status', 'character_id',
        'created_by', 'updated_by '
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Shop::class, 'company_id', 'id');
    }

    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(Character::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Character::class, 'updated_by', 'id');
    }
}
