<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FirmProvided extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;
    function firm(){
        return $this->belongsTo(Firm::class);
    }
}
