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

    const ROLE_ADMIN = 'admin';

    const ROLE_ANGGOTA = 'anggota';


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

    public function PencatatanRecords()
    {
        return $this->hasMany(Pencatatan::class, 'user_id', 'id');
    }

    public function isAdmin(){
        if ($this->role != self::ROLE_ADMIN) {
            return false;
        }

        return true;
    } 

    public function isAnggota(){
        if ($this->role != self::ROLE_ANGGOTA) {
            return false;
        }

        return true;
    } 

    // public function getRedirectRoute()
    // {
    //     return match($this->role) {
    //         'admin' => 'admin.dashboard',
    //         'anggota' => 'anggota.dashboard',
    //     };
    // }
    // protected function type(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) =>  ["anggota", "super-admin", "manager"][$value],
    //     );
    // }

    // public function getAvatarUrlAttribute()
    // {
    //     if ($this->photo && Storage::disk('avatars')->exists($this->avatar)) {
    //         return Storage::disk('avatars')->url($this->avatar);
    //     }

    //     return asset('noimage.png');
    // }

    // public function role(): Attribute
	// {
	// 	return new Attribute(
    //         get: fn($value) =>["admin", "anggota"][$value],
    //     );
	// }
}
