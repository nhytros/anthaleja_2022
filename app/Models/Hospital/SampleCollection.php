<?php

namespace App\Models\Hospital;

use App\Models\Character;
use App\Models\Hospital\Laboratory;
use App\Models\Hospital\Investigation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SampleCollection extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_sample_collections';
    protected $fillable = [
        'sample_code', 'collect_date', 'dispatch_date', 'cancel_dispatch_date',
        'status', 'investigation_id', 'laboratory_id', 'approved_by',
        'created_by', 'updated_by',
    ];

    public function investigation()
    {
        return $this->belongsTo(Investigation::class, 'investigation_id', 'id');
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'laboratory_id', 'id');
    }

    public function approvedBy()
    {
        return $this->belongsTo(Character::class, 'approved_by', 'id');
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
