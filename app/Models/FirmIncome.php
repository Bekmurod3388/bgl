<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FirmIncome extends Model
{
    use HasFactory, SoftDeletes;

    function firm(){
        return $this->belongsTo(Firm::class);
    }
}
