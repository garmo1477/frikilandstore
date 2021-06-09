<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id 
 * @property string $name
 * @property string $role
 * @property string $email 
 * @property string $password
 */

class User extends Authenticatable
{
    use Notifiable;

    const SELLER = 'SELLER';
    const BUYER = 'BUYER';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isSeller()
    {
        // función para saber luego si el usuario conectado es vendedor o comprador
        return $this->role === User::SELLER;
    }

    public function order()
    {
        // relación de uno a muchos, porque un comprados podrá tener varios pedidos
        return $this->hasMany(Order::class);
    }
}
