<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CupomNotification extends Notification
{
    use Queueable;

    public $codigo;
    public $vantagem;
    public $preco;
    public $empresa;

    public function __construct($codigo, $vantagem, $preco, $empresa)
    {
        $this->codigo = $codigo;
        $this->vantagem = $vantagem;
        $this->preco = $preco;
        $this->empresa = $empresa;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Notificação de Confirmação')
                    ->greeting('Olá!')
                    ->line('Aqui está o seu código de cupom: ' . $this->codigo)
                    ->line('Você resgatou a vantagem: ' . $this->vantagem)
                    ->line('Preço pago: ' . $this->preco . ' moedas')
                    ->line('Esta vantagem foi disponibilizada por: ' . $this->empresa)
                    ->line('Obrigado por usar nosso aplicativo!')
                    ->salutation('Obrigado por usar nosso aplicativo!');
    }
}

