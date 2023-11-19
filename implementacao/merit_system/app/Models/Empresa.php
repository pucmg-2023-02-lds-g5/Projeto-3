<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class Empresa extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        // Adicione outros campos conforme necessário
    ];


    public function routeNotificationFor($driver)
{
    // Este é apenas um exemplo. Você pode precisar ajustar isso de acordo com suas necessidades.
    if (method_exists($this, $method = "routeNotificationFor".ucfirst($driver))) {
        return $this->{$method}();
    }

    // Se o método não existir, retorne o endereço de e-mail por padrão
    return $this->email;
}

}
