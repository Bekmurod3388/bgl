<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellProvided extends Model
{
    protected $fillable = [ 'sell_id','given_sum','date'];

    use HasFactory, SoftDeletes;

    public function selll()
    {
        return $this->belongsTo(Sell::class, 'sell_id', 'id');
    }

}
