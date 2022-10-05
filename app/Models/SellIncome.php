<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellIncome extends Model
{    use HasFactory, SoftDeletes;


    protected $fillable = [
        'sell_id','car_number','product_id','kg','how_sum','total_sum',
    ];

    public function productt()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function selll()
    {
        return $this->belongsTo(Sell::class, 'sell_id', 'id');
    }
}
