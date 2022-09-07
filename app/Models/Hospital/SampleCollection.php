<?php

namespace App\Models\Hospital;

use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SampleCollection extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_sample_collections';
    protected $fillable = [
        'sample_code', 'collect_date', 'dispatch_date', 'cancel_dispatch_date',
        'status', 'investigation_id', 'laboratory_id', 'approved_by',
        'created_by', 'updated_by',
    ];
}
