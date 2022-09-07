<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'hospital_settings';
    protected $fillable = [
        'name', 'website', 'phone', 'address', 'email', 'logo', 'favicon', 'size', 'type',
        'natter', 'invoice_prefix', 'invoice_logo', 'user_prefix', 'patient_prefix',
        'invoice_number_mood', 'invoice_last_number', 'taxes', 'discount', 'founded_at',
    ];
}
