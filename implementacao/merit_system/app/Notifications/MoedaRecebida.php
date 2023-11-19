<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MoedaRecebida extends Notification
{
    use Queueable;

    private $detalhes;

    public function __construct($detalhes)
    {
        $this->detalhes = $detalhes;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Olá!')
                    ->line('Você recebeu ' . $this->detalhes['quantidade'] . ' moedas do professor ' . $this->detalhes['professor'] . '.')
                    ->line('Mensagem: ' . $this->detalhes['mensagem'])
                    ->action('Verifique seu saldo', url('/'))
                    ->line('Obrigado por usar nosso sistema!');
    }
}

