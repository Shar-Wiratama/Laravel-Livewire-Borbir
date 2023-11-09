<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // const ROLE_ADMIN = 'admin';

    // const ROLE_ANGGOTA = 'anggota';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'role_id',
        'initial_meter',
        'deposit',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function isAdmin(){
    //     return false;
    // } 

    // protected function type(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) =>  ["anggota", "super-admin", "manager"][$value],
    //     );
    // }

    public function role()
	{
		return $this->belongsTo(RoleUser::class, 'role_id');
	}
}
