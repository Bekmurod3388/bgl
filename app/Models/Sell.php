<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = [
        'maxsulot_id', 'kimga', 'necha_somdan', 'kg', 'jami_summ', 'bergan_summ', 'qarzdorlik', 'sanasi', 'avto_raqam',
    ];

    public function productt()
    {
        return $this->belongsTo(Product::class, 'maxsulot_id', 'id');
    }


    use HasFactory;
}
