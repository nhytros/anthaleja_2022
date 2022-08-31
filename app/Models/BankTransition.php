<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransition extends Model
{
    use HasFactory;
    protected $fillable = ['character_id', 'receiver_id', 'income', 'outcome', 'description'];
}
