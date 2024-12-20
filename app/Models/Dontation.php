<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dontation extends Model
{
    protected $fillable = [
        'donor_name',
        'amount',
        'status',
        'refno',
        'email'
    ];
}
