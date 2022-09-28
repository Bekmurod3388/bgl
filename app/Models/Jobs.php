<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model
{
    use HasFactory,SoftDeletes;
    public function worker(){
        return $this->belongsTo(Worker::class,'worker_id','id');
    }
    public function work(){
        return $this->belongsTo(Work::class,'type_work_id','id');
    }
}
