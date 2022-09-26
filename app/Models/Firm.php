<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Firm extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='firms';

    protected $fillable=[
          'name',
          'all_sum',
          'indebtedness',
          'given_sum',
    ];
}
