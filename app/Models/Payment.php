<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table='payments';

    protected $fillable = [
        'user_id',
        'pencatatan_id',
        'tanggal_konfirmasi',
        'jam_konfirmasi',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function pencatatan(){
        return $this->belongsTo(Pencatatan::class, 'pencatatan_id', 'id');
    }
}
