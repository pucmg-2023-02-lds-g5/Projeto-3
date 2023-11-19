<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmpresaNotification extends Notification
{
    use Queueable;

    private $aluno;
    private $codigo;
    private $vantagem;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($aluno, $codigo, $vantagem)
    {
        $this->aluno = $aluno;
        $this->codigo = $codigo;
        $this->vantagem = $vantagem;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
{
    return (new MailMessage)
            ->subject('Notificação de Resgate')
            ->greeting('Olá!')
            ->line('O aluno ' . $this->aluno->nome . ' de CPF: ' . $this->aluno->cpf . ' resgatou a vantagem ' . $this->vantagem->nome . ' com o código: ' . $this->codigo)
            ->salutation('Obrigado por usar nosso aplicativo!');
}
}


