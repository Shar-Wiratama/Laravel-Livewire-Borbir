<?php

namespace App\Models;

use table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pencatatan extends Model
{
    use HasFactory;

    protected $table='pencatatan';

    protected $fillable = [
        'user_id',
        'updated_meter',
        'usage_meter',
        'initial_price',
        'fine',
        'total_price',
        'photo',
        'status',
        'tanggal_buat',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'payment_id', 'id');
    }
}
