<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkerGave extends Model
{
    use HasFactory,SoftDeletes;

    function worker(){
        return $this->belongsTo(Worker::class);
    }
}
