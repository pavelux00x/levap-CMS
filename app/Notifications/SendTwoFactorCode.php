<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendTwoFactorCode extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Codice di autenticazione a due fattori')
            ->greeting('Ciao!')
            ->line('Il tuo codice di autenticazione a due fattori è: ' . $notifiable->two_factor_code)
            ->line('Il codice scadrà in 10 minuti.')
            ->line('Se non hai richiesto questo codice, contatta immediatamente il supporto.')
            ->salutation('Saluti, Levap Team');
    }
}

?>