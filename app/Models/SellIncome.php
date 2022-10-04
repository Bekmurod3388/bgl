<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellIncome extends Model
{

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
    use HasFactory;
}
