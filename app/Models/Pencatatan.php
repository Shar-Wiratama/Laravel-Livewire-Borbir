<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencatatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'updated_meter',
        'usage_meter',
        'price',
        'photo',
    ];
}
