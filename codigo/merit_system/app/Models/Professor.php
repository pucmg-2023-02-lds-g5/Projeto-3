<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Professor extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome',
        'cpf',
        'departamento',
        'email',
        'password',
        'saldo',
        'instituicao',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

