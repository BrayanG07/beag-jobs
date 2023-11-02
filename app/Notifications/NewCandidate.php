<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;
    public int $id_vacant;
    public string $name_vacant;
    public int $user_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_vacant, $name_vacant, $user_id)
    {
        $this->id_vacant = $id_vacant;
        $this->name_vacant = $name_vacant;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // * Enviar la notificacion por email y tambien almacenarla en DB
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notifications');

        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante')
                    ->line('La vacante es: '. $this->name_vacant)
                    ->action('Ver Notificaciones', $url)
                    ->line('Gracias por utilizar ' . env('APP_NAME'));
    }

    // Almacena las notificaciones en la DB.
    public function toDatabase(object $notifiable)
    {
        return [
            'id_vacant' => $this->id_vacant,
            'name_vacant' => $this->name_vacant,
            'user_id' => $this->user_id,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
