<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * The ID of the vacancy.
     *
     * @var int
     */
    protected $id_vacante;

    /**
     * The name of the vacancy.
     *
     * @var string
     */
    protected $nombre_vacante;

    /**
     * The ID of the user.
     *
     * @var int
     */
    protected $usuarios_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_vacante, $nombre_vacante, $usuarios_id )
    {
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuarios_id = $usuarios_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notificaciones');

        return (new MailMessage)
            ->subject('Nuevo candidato para la vacante ' . $this->nombre_vacante)
            ->greeting('Hola ' . $notifiable->name)
            ->line('Se ha postulado un nuevo candidato para la vacante ' . $this->nombre_vacante)
            ->action('Ver notificaciones', $url)
            ->line('Gracias por utilizar DevJobs!');
    }



    public function toDatabase(object $notifiable): array
    {
        return [
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'usuarios_id' => $this->usuarios_id
        ];
    }

}
