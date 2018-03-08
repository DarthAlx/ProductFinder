<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\PAsswords\CanResetPassword;

class RecuperaciónDeContraseña extends ResetPassword
{
    use Queueable;


     public function toMail($notifiable)
    {

        return (new MailMessage)
                    ->subject('Recuperación de contraseña')
                    ->greeting('Hola!')
                    ->line('Recibes este mensaje porque se nos solicitó la recuperación de la contraseña de tu cuenta.')
                    ->action('Recuperar contraseña', url('password/reset', $this->token))
                    ->line('Si no fuiste tu quien realizó la petición, puedes ignorar este correo.')
                    ->salutation('Saludos, '. config('app.name'));
    }


}
