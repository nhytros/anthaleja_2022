<?php

namespace App\Models\Hospital;

use App\Models\Character;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hospital\BillingTransaction;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\CreateAndUpdateTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChequeDetail extends Model
{
    use HasFactory, SoftDeletes, CreateAndUpdateTable;

    public $table = 'hospital_cheque_details';
    protected $fillable = [
        'number', 'date', 'status', 'billing_transaction_id', 'created_by', 'updated_by',
    ];

    public function billing_transactions()
    {
        return $this->hasMany(BillingTransaction::class, 'billing_transaction_id', 'id');
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
