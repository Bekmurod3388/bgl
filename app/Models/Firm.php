<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Firm extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'firms';

    protected $attributes = [
        'all_sum' => 0,
        'indebtedness' => 0,
        'given_sum' => 0,
    ];
    protected $fillable = [
        'name',
        'all_sum',
        'indebtedness',
        'given_sum',
    ];
}
