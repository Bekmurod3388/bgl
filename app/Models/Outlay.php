<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outlay extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='outlay';

    public $timestamps = false;
    protected $fillable = [
        'date', 'outlay_name', 'summ', 'one_summ', 'all_summ'
    ];
}
