<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

class ResetPassword extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        $url = URL::temporarySignedRoute('reset-password', now()->addHours(12) ,['id' => $this->token]);
        return (new MailMessage)
                    ->line('Bonjour')
                    ->subject('Réinitialisation du mot de passe')
                    ->line('Vous recevez cet email car vous avez demandé une réinitialisation de votre mot de passe')
                    ->action('Réinitialiser mon mot de passe', $url )
                    ->line("If you didn't request this, please ignore this email.")
                    ->line("Si vous n'avez pas fait cette requête, merci d'ignorer cet email")
                    ->line('Merci !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
