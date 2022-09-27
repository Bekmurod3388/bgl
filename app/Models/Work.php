<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tur;
class Work extends Model
{
    use HasFactory,SoftDeletes;
    public function types(){
        return $this->belongsTo(Tur::class,'type','id');
    }
}
