<?php

namespace FederalSt;

use FederalSt\Notifications\MyResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role','phone', 'cpf'
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
     * Enviando notificação de recuperação de senha.
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPasswordNotification($token));
    }


}
